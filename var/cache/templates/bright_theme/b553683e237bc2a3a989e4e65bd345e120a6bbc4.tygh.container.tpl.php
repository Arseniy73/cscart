<?php /* Smarty version Smarty-3.1.21, created on 2020-11-30 11:02:28
         compiled from "C:\xampp\htdocs\cscart\design\themes\responsive\templates\views\block_manager\render\container.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18307725855fc4a714daaeb7-41237851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b553683e237bc2a3a989e4e65bd345e120a6bbc4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cscart\\design\\themes\\responsive\\templates\\views\\block_manager\\render\\container.tpl',
      1 => 1606642615,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18307725855fc4a714daaeb7-41237851',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout_data' => 0,
    'container' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5fc4a714dcc2a0_02508521',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc4a714dcc2a0_02508521')) {function content_5fc4a714dcc2a0_02508521($_smarty_tpl) {?><div class="<?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed") {?>container-fluid <?php } else { ?>container<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['container']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div><?php }} ?>
