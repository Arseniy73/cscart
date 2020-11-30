<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

namespace Tygh\Addons\YandexCheckout\Payments;

use Tygh\Addons\YandexCheckout\Enum\CommissionType;
use Tygh\Addons\YandexCheckout\Services\PayoutsManagerService;
use Tygh\Addons\YandexCheckout\Services\ReceiptService;
use Tygh\Enum\YesNo;
use Tygh\Addons\YandexCheckout\Api\Client;

class YandexCheckoutForMarketplaces
{
    /** @var string */
    protected $shop_id;

    /** @var string */
    protected $secret_key;

    /** @var \Tygh\Addons\YandexCheckout\Api\Client */
    protected $client;

    /** @var \Tygh\Addons\YandexCheckout\Services\ReceiptService */
    protected $receipt_service;

    /** @var \Tygh\Addons\YandexCheckout\Services\PayoutsManagerService */
    protected $payouts_manager_service;

    public function __construct(
        $shop_id,
        $secret_key,
        ReceiptService $receipt_service,
        PayoutsManagerService $payouts_manager_service
    ) {
        $this->client = new Client();
        $this->shop_id = $shop_id;
        $this->secret_key = $secret_key;
        $this->receipt_service = $receipt_service;
        $this->payouts_manager_service = $payouts_manager_service;
        $this->authorize();
    }

    protected function authorize()
    {
        $this->client->setAuth($this->shop_id, $this->secret_key);
    }

    /**
     * @param array $order_info
     * @param array $processor_data
     *
     * @return \YandexCheckout\Request\Payments\CreatePaymentResponse
     *
     * @throws \Exception
     */
    public function createPayment(array $order_info, array $processor_data)
    {
        $params = [
            'amount'       => [
                'value'    => $processor_data['processor_params']['currency'] != CART_PRIMARY_CURRENCY
                    ? fn_format_price_by_currency($order_info['total'], CART_PRIMARY_CURRENCY, $processor_data['processor_params']['currency'])
                    : $order_info['total'],
                'currency' => $processor_data['processor_params']['currency'],
            ],
            'confirmation' => [
                'type'       => 'redirect',
                'return_url' => fn_url(
                    'yandex_checkout_for_marketplaces.return_to_store?order_id=' . $order_info['order_id']
                ),
            ],
            'capture'      => true,
            'metadata'     => [
                'order_id' => $order_info['order_id'],
            ],
        ];

        $transfers = $this->getTransfers($order_info);
        foreach ($transfers as $transfer) {
            $param_transfer = [
                'account_id' => $transfer['shop_id'],
                'amount'     => [
                    'value'    => $processor_data['processor_params']['currency'] != CART_PRIMARY_CURRENCY
                        ? fn_format_price_by_currency($transfer['total'], CART_PRIMARY_CURRENCY, $processor_data['processor_params']['currency'])
                        : $transfer['total'],
                    'currency' => $processor_data['processor_params']['currency'],
                ],
            ];
            if (isset($transfer['fee'])) {
                $param_transfer['platform_fee_amount'] = [
                    'value' => $transfer['fee'],
                    'currency' => $processor_data['processor_params']['currency'],
                ];
            }
            $params['transfers'][] = $param_transfer;
            if ($transfer['company_id']) {
                $params['metadata']["transfer_{$transfer['company_id']}"] = $transfer['withdrawal_amount'];
            }
        }

        $payment = $this->client->createPayment($params);

        return $payment;
    }

    /**
     * @param array  $order_info
     * @param int    $shop_id
     * @param string $payment_mode
     * @param string $settlement_type
     *
     * @return \YandexCheckout\Request\Receipts\AbstractReceiptResponse|null
     *
     * @throws \YandexCheckout\Common\Exceptions\ApiConnectionException
     * @throws \YandexCheckout\Common\Exceptions\ApiException
     * @throws \YandexCheckout\Common\Exceptions\AuthorizeException
     * @throws \YandexCheckout\Common\Exceptions\BadApiRequestException
     * @throws \YandexCheckout\Common\Exceptions\ForbiddenException
     * @throws \YandexCheckout\Common\Exceptions\InternalServerError
     * @throws \YandexCheckout\Common\Exceptions\NotFoundException
     * @throws \YandexCheckout\Common\Exceptions\ResponseProcessingException
     * @throws \YandexCheckout\Common\Exceptions\TooManyRequestsException
     * @throws \YandexCheckout\Common\Exceptions\UnauthorizedException
     */
    public function createReceipt(array $order_info, $shop_id, $payment_mode, $settlement_type)
    {
        if (!$shop_id) {
            $shop_id = $this->shop_id;
        }

        $receipt = $this->receipt_service->getPaymentReceiptFromOrder(
            $order_info,
            $shop_id,
            $payment_mode,
            $settlement_type
        );

        return $this->client->createReceipt($receipt);
    }

    /**
     * @param $payment_id
     *
     * @return \YandexCheckout\Model\PaymentInterface
     *
     * @throws \YandexCheckout\Common\Exceptions\ApiException
     * @throws \YandexCheckout\Common\Exceptions\BadApiRequestException
     * @throws \YandexCheckout\Common\Exceptions\ExtensionNotFoundException
     * @throws \YandexCheckout\Common\Exceptions\ForbiddenException
     * @throws \YandexCheckout\Common\Exceptions\InternalServerError
     * @throws \YandexCheckout\Common\Exceptions\NotFoundException
     * @throws \YandexCheckout\Common\Exceptions\ResponseProcessingException
     * @throws \YandexCheckout\Common\Exceptions\TooManyRequestsException
     * @throws \YandexCheckout\Common\Exceptions\UnauthorizedException
     */
    public function getPaymentInfo($payment_id)
    {
        return $this->client->getPaymentInfo($payment_id);
    }

    /**
     * @param array $order_info
     *
     * @return array
     */
    public function getTransfers(array $order_info)
    {
        $transfers = [];
        if (YesNo::toBool($order_info['is_parent_order'])) {
            $orders = fn_get_suborders_info($order_info['order_id']);
        } else {
            $orders = [$order_info];
        }

        foreach ($orders as $order) {
            $order_id = (int) $order['order_id'];
            $company_id = (int) $order['company_id'];
            $total = (float) $order['total'];

            $fee = $this->payouts_manager_service->getManager($company_id)->getOrderFee($order_id);
            if ($fee) {
                $fee = min($fee, $total);
                $total -= $fee;
            }

            if (!$total) {
                continue;
            }

            $company_data = fn_get_company_data($company_id);
            $shop_id = $company_data['yandex_checkout_shopid']
                ?: null;

            $transfer = [
                'order_id'          => $order_id,
                'company_id'        => $company_id,
                'total'             => $order['total'],
                'shop_id'           => $shop_id,
                'withdrawal_amount' => (string) $total,
            ];
            if ($company_data['yandex_checkout_commission_type'] === CommissionType::FLEXIBLE) {
                $transfer['fee'] = $fee;
            }
            $transfers[] = $transfer;
        }

        return $transfers;
    }
}