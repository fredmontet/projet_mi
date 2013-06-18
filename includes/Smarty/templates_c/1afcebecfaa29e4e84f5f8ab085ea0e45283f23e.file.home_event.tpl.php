<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 07:08:10
         compiled from "includes\templates\home_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1709951c0075ad1cab0-99816255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1afcebecfaa29e4e84f5f8ab085ea0e45283f23e' => 
    array (
      0 => 'includes\\templates\\home_event.tpl',
      1 => 1371539169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1709951c0075ad1cab0-99816255',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nextEvent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c0075b18b2f6_84339451',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c0075b18b2f6_84339451')) {function content_51c0075b18b2f6_84339451($_smarty_tpl) {?><article>
	<h1><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getMainTopic();?>
</h1>
	<p><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getStartingDate();?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getDescription();?>
</p>
	
</article><?php }} ?>