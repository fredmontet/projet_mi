<?php /* Smarty version Smarty-3.1.13, created on 2013-06-17 22:09:00
         compiled from "includes/templates/home_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14804157051bf43697867b5-71330033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c411e2c3f3a71533616619ead79f43b620d9fe08' => 
    array (
      0 => 'includes/templates/home_event.tpl',
      1 => 1371499737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14804157051bf43697867b5-71330033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51bf43697b9782_17571759',
  'variables' => 
  array (
    'nextEvent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bf43697b9782_17571759')) {function content_51bf43697b9782_17571759($_smarty_tpl) {?><article>
	<h1><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getMainTopic();?>
</h1>
	<p><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getStartingDate();?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['nextEvent']->value->getDescription();?>
</p>
	
</article><?php }} ?>