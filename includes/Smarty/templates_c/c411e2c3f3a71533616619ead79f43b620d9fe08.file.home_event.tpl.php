<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 11:41:03
         compiled from "includes/templates/home_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183776899751c02b2f550a40-92642199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c411e2c3f3a71533616619ead79f43b620d9fe08' => 
    array (
      0 => 'includes/templates/home_event.tpl',
      1 => 1371538832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183776899751c02b2f550a40-92642199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nextEvent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c02b2f59bcf3_54722423',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c02b2f59bcf3_54722423')) {function content_51c02b2f59bcf3_54722423($_smarty_tpl) {?><article>
	<h1><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getMainTopic();?>
</h1>
	<p><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getStartingDate();?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getDescription();?>
</p>
	
</article><?php }} ?>