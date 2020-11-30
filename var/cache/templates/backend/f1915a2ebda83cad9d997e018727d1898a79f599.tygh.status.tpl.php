<?php /* Smarty version Smarty-3.1.21, created on 2020-11-30 11:01:41
         compiled from "C:\xampp\htdocs\cscart\design\backend\templates\views\companies\components\bulk_edit\status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7928570145fc4a6e56e1951-57258382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1915a2ebda83cad9d997e018727d1898a79f599' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cscart\\design\\backend\\templates\\views\\companies\\components\\bulk_edit\\status.tpl',
      1 => 1598937726,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7928570145fc4a6e56e1951-57258382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'c_statuses' => 0,
    'status_name' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5fc4a6e5708c70_88679301',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc4a6e5708c70_88679301')) {function content_5fc4a6e5708c70_88679301($_smarty_tpl) {?><?php
\Tygh\Languages\Helper::preloadLangVars(array('change_to_status'));
?>
<?php  $_smarty_tpl->tpl_vars['status_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status_name']->_loop = false;
 $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['c_statuses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status_name']->key => $_smarty_tpl->tpl_vars['status_name']->value) {
$_smarty_tpl->tpl_vars['status_name']->_loop = true;
 $_smarty_tpl->tpl_vars['status']->value = $_smarty_tpl->tpl_vars['status_name']->key;
?>
    <li>
        <?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_smarty_tpl->__("change_to_status",array("[status]"=>((string)$_smarty_tpl->tpl_vars['status_name']->value))),'dispatch'=>"dispatch[companies.m_update_statuses]",'form'=>"companies_form",'class'=>"cm-process-items cm-dialog-opener",'data'=>array("data-ca-target-id"=>"content_selected_make_status_".((string)$_smarty_tpl->tpl_vars['status']->value))));?>

    </li>
<?php } ?><?php }} ?>
