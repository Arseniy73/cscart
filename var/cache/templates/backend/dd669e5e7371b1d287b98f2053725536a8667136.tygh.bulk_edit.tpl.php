<?php /* Smarty version Smarty-3.1.21, created on 2020-11-30 11:01:41
         compiled from "C:\xampp\htdocs\cscart\design\backend\templates\views\companies\components\bulk_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21363072815fc4a6e5050583-62893770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd669e5e7371b1d287b98f2053725536a8667136' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cscart\\design\\backend\\templates\\views\\companies\\components\\bulk_edit.tpl',
      1 => 1598937726,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '21363072815fc4a6e5050583-62893770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'runtime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5fc4a6e507b661_33598747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc4a6e507b661_33598747')) {function content_5fc4a6e507b661_33598747($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include 'C:/xampp/htdocs/cscart/app/functions/smarty_plugins\\block.hook.php';
?><?php
\Tygh\Languages\Helper::preloadLangVars(array('selected','status','actions'));
?>
<div class="bulk-edit clearfix hidden"
     data-ca-bulkedit-expanded-object="true"
>

    <ul class="btn-group bulk-edit__wrapper">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:bulk_edit_items")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:bulk_edit_items"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <li class="btn bulk-edit__btn bulk-edit__btn--check-items">
                <input class="bulk-edit__btn-content--checkbox hidden bulkedit-disabler" 
                    type="checkbox" 
                    checked 
                    data-ca-bulkedit-toggler="true"
                    data-ca-bulkedit-enable="[data-ca-bulkedit-default-object=true]" 
                    data-ca-bulkedit-disable="[data-ca-bulkedit-expanded-object=true]"
                />
                <span class="bulk-edit__btn-content dropdown-toggle" data-toggle="dropdown">
                    <span data-ca-longtap-selected-counter="true">0</span> <span class="mobile-hide"><?php echo $_smarty_tpl->__("selected");?>
</span> <span class="caret mobile-hide"></span>
                </span>
                <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dropdown_menu_class'=>"cm-check-items",'wrap_select_actions_into_dropdown'=>true,'check_statuses'=>fn_get_predefined_statuses("companies",$_smarty_tpl->tpl_vars['company']->value['status'])), 0);?>

            </li>

            <?php if (!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
                <li class="btn bulk-edit__btn bulk-edit__btn--status dropleft-mod">
                    <span class="bulk-edit__btn-content dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->__("status");?>
 <span class="caret mobile-hide"></span></span>

                    <ul class="dropdown-menu">
                        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/bulk_edit/status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </ul>
                </li>
            <?php }?>

            <li class="btn bulk-edit__btn bulk-edit__btn--actions dropleft-mod">
                <span class="bulk-edit__btn-content dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->__("actions");?>
 <span class="caret mobile-hide"></span></span>

                <ul class="dropdown-menu">
                    <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/bulk_edit/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </ul>
            </li>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:bulk_edit_items"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </ul>

</div>
<?php }} ?>
