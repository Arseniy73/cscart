<?php /* Smarty version Smarty-3.1.21, created on 2020-11-30 11:00:56
         compiled from "C:\xampp\htdocs\cscart\design\backend\templates\addons\yandex_checkout\hooks\companies\detailed_content.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18792067315fc4a6b8e73807-27137330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d20fdbc26a1d3dc2af3219a9e5cc50abcb8e041' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cscart\\design\\backend\\templates\\addons\\yandex_checkout\\hooks\\companies\\detailed_content.post.tpl',
      1 => 1598937726,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18792067315fc4a6b8e73807-27137330',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_yandex_checkout_for_marketplaces_used' => 0,
    'runtime' => 0,
    'company_data' => 0,
    'is_vendor_plans_installed' => 0,
    'addons_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5fc4a6b8ed2223_71080411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc4a6b8ed2223_71080411')) {function content_5fc4a6b8ed2223_71080411($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include 'C:/xampp/htdocs/cscart/app/functions/smarty_plugins\\block.inline_script.php';
?><?php
\Tygh\Languages\Helper::preloadLangVars(array('yandex_checkout.yandex_checkout','yandex_checkout.shop_id','yandex_checkout.yandex_checkout_for_marketplaces_vendor_info','yandex_checkout.commission_type','yandex_checkout.fixed_commission_type','yandex_checkout.flexible_commission_type','yandex_checkout.commission_type_from_yandex_agreement','yandex_checkout.marketplace_fee','yandex_checkout.marketplace_fee_notice','yandex_checkout.marketplace_fee_disabled_notice'));
?>
<?php if ($_smarty_tpl->tpl_vars['is_yandex_checkout_for_marketplaces_used']->value&&!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->__("yandex_checkout.yandex_checkout")), 0);?>

    <div class="control-group">
        <label class="control-label"
               for="elm_yandex_checkout_shop_id"
        ><?php echo $_smarty_tpl->__("yandex_checkout.shop_id");?>
:</label>
        <div class="controls">
            <input type="text"
                   name="company_data[yandex_checkout_shopid]"
                   id="elm_yandex_checkout_shop_id"
                   value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['yandex_checkout_shopid'], ENT_QUOTES, 'UTF-8');?>
"
            />
        </div>
        <div class="controls">
            <p class="muted description">
                <?php echo $_smarty_tpl->__("yandex_checkout.yandex_checkout_for_marketplaces_vendor_info");?>

            </p>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="commission_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['runtime']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("yandex_checkout.commission_type");?>
:</label>
        <div class="controls">
            <select name="company_data[yandex_checkout_commission_type]" id="commission_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['runtime']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
">
                <option value="<?php echo htmlspecialchars(constant("Tygh\Addons\YandexCheckout\Enum\CommissionType::FIXED"), ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['company_data']->value['yandex_checkout_commission_type']===constant("Tygh\Addons\YandexCheckout\Enum\CommissionType::FIXED")) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->__("yandex_checkout.fixed_commission_type");?>
</option>
                <option value="<?php echo htmlspecialchars(constant("Tygh\Addons\YandexCheckout\Enum\CommissionType::FLEXIBLE"), ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['company_data']->value['yandex_checkout_commission_type']===constant("Tygh\Addons\YandexCheckout\Enum\CommissionType::FLEXIBLE")) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->__("yandex_checkout.flexible_commission_type");?>
</option>
            </select>
        </div>
        <div class="controls">
            <p class="muted description"><?php echo $_smarty_tpl->__("yandex_checkout.commission_type_from_yandex_agreement");?>
</p>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"
               for="elm_yandex_checkout_marketplace_fee"
        ><?php echo $_smarty_tpl->__("yandex_checkout.marketplace_fee");?>
:</label>
        <div class="controls">
            <input type="text"
                   name="company_data[yandex_checkout_marketplace_fee]"
                   id="elm_yandex_checkout_marketplace_fee"
                   value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['yandex_checkout_marketplace_fee'], ENT_QUOTES, 'UTF-8');?>
"
                   <?php if (!$_smarty_tpl->tpl_vars['is_vendor_plans_installed']->value) {?>disabled<?php }?>
            /> %
        </div>
        <div class="controls">
            <p class="muted description">
                <?php if ($_smarty_tpl->tpl_vars['is_vendor_plans_installed']->value) {?>
                    <?php echo $_smarty_tpl->__("yandex_checkout.marketplace_fee_notice");?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->__("yandex_checkout.marketplace_fee_disabled_notice",array("[href]"=>$_smarty_tpl->tpl_vars['addons_page']->value));?>

                <?php }?>
            </p>
        </div>
    </div>
<?php }?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
>
    (function(_, $) {
        var $fixedCommissionFee = $('#elm_yandex_checkout_marketplace_fee');
        var $commissionSelector = $('#commission_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['runtime']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
');
        var $is_vendor_plans_installed = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['is_vendor_plans_installed']->value, ENT_QUOTES, 'UTF-8');?>
;

        $.ceEvent('on', 'ce.commoninit', function () {
            if ($commissionSelector.val() !== 'fixed' || !$is_vendor_plans_installed) {
                $fixedCommissionFee.prop('readonly', true).prop('disabled', true);
            } else {
                $fixedCommissionFee.prop('readonly', null).prop('disabled', null);
            }
        });

        $commissionSelector.change(function () {
            if ($commissionSelector.val() !== 'fixed' || !$is_vendor_plans_installed) {
                $fixedCommissionFee.prop('readonly', true).prop('disabled', true);
            } else {
                $fixedCommissionFee.prop('readonly', null).prop('disabled', null);
            }
        });
    })(Tygh, Tygh.$);
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
