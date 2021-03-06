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


namespace Tygh\Addons\ProductVariations\Product\Sync;


class CallableSyncItem implements ISyncItem
{
    protected $callable;

    public function __construct(Callable $callable)
    {
        $this->callable = $callable;
    }

    public function sync($source_product_id, array $destination_product_ids, array $conditions = [])
    {
        call_user_func($this->callable, $source_product_id, $destination_product_ids, $conditions);
    }

    public static function create(Callable $callable)
    {
        return new self($callable);
    }
}