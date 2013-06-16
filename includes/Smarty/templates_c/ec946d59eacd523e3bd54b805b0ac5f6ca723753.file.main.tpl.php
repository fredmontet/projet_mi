<?php /* Smarty version Smarty-3.1.13, created on 2013-06-16 09:08:04
         compiled from "includes/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152501265751bd5ee3015234-12431342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec946d59eacd523e3bd54b805b0ac5f6ca723753' => 
    array (
      0 => 'includes/templates/main.tpl',
      1 => 1371366483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152501265751bd5ee3015234-12431342',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51bd5ee3084de5_50524092',
  'variables' => 
  array (
    'action' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bd5ee3084de5_50524092')) {function content_51bd5ee3084de5_50524092($_smarty_tpl) {?><!Doctype html>
<html lang="en">
    <head>
	    <meta charset="utf-8" />
	    <link rel="stylesheet" media="all" href="htdocs/css/style.css" />
	    <title>project 143</title>
	</head>
    <body>
    <header id="globalheader">
	    <nav id="topheader">
		    <ul id="globalnav">
			    <li id="gn-about"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='about'){?>class="selected"<?php }?> href="?action=about">About</a></li>
			    <li id="gn-events"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='events'){?>class="selected"<?php }?> href="?action=events">Events</a></li>
			    <li id="gn-videos"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='videos'){?>class="selected"<?php }?> href="?action=videos">Videos</a></li>
			    <li id="gn-partners"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='partners'){?>class="selected"<?php }?> href="?action=partners">Partners</a></li>
				<li id="gn-press"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='press'){?>class="selected"<?php }?> href="?action=press">Press</a></li>
				<li id="gn-contact"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='contact'){?>class="selected"<?php }?> href="?action=contact">Contact</a></li>
				<li id="gn-gestion"><a <?php if ($_smarty_tpl->tpl_vars['action']->value=='gestion'){?>class="selected"<?php }?> href="?action=gestion">Gestion</a></li>
		    </ul>
		    
			
				<div id="login">
		    		<a href="?action=login">Login</a>
				</div>
		  	
		    
	    </nav>
	    <nav id="bottomheader">
		    <div id="logo"></div>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    <footer id="globalfooter">
		<p>This independent TEDx event is operated under license from TED.</p>
	</footer>
</body><?php }} ?>