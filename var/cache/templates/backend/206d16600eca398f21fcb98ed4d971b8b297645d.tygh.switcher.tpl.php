<?php /* Smarty version Smarty-3.1.21, created on 2020-11-30 11:00:55
         compiled from "C:\xampp\htdocs\cscart\design\backend\templates\common\switcher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:490086075fc4a6b7437e74-27756152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '206d16600eca398f21fcb98ed4d971b8b297645d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cscart\\design\\backend\\templates\\common\\switcher.tpl',
      1 => 1598937726,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '490086075fc4a6b7437e74-27756152',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta' => 0,
    'extra_attrs' => 0,
    'id' => 0,
    'checked' => 0,
    'input_name' => 0,
    'input_value' => 0,
    'input_id' => 0,
    'input_attrs' => 0,
    'input_class' => 0,
    'input_readonly' => 0,
    'input_disabled' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5fc4a6b7497456_50809110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc4a6b7497456_50809110')) {function content_5fc4a6b7497456_50809110($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_render_tag_attrs')) include 'C:/xampp/htdocs/cscart/app/functions/smarty_plugins\\modifier.render_tag_attrs.php';
?><div class="switch-mini ty-switch-checkbox cm-switch-checkbox list-btns <?php if ($_smarty_tpl->tpl_vars['meta']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['meta']->value, ENT_QUOTES, 'UTF-8');
}?>"
     <?php if ($_smarty_tpl->tpl_vars['extra_attrs']->value) {?>
         <?php echo smarty_modifier_render_tag_attrs($_smarty_tpl->tpl_vars['extra_attrs']->value);?>

     <?php }?>
     <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
         id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"
     <?php }?>
>
    <input type="checkbox"
           <?php if ($_smarty_tpl->tpl_vars['checked']->value) {?>
               checked="checked"
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_name']->value) {?>
               name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
"
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_value']->value) {?>
               value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_value']->value, ENT_QUOTES, 'UTF-8');?>
"
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_id']->value) {?>
               id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_id']->value, ENT_QUOTES, 'UTF-8');?>
"
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_attrs']->value) {?>
               <?php echo smarty_modifier_render_tag_attrs($_smarty_tpl->tpl_vars['input_attrs']->value);?>

           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_class']->value) {?>
               class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_class']->value, ENT_QUOTES, 'UTF-8');?>
"
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_readonly']->value) {?>
               readonly
           <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['input_disabled']->value) {?>
               disabled
           <?php }?>
    />
</div>
<?php }} ?>
