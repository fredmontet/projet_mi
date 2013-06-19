<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 07:00:18
         compiled from "includes\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1159851c157027dc922-54602537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '603b38121a9d2b6270740b65475f867ee528dadc' => 
    array (
      0 => 'includes\\templates\\main.tpl',
      1 => 1371453707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1159851c157027dc922-54602537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'userIsLogged' => 0,
    'username' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c157028d52c2_38879385',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c157028d52c2_38879385')) {function content_51c157028d52c2_38879385($_smarty_tpl) {?><!Doctype html>
<html lang="en">
    <head>
	    <meta charset="utf-8" />
	    <link rel="stylesheet" media="all" href="htdocs/css/style.css" />
	    <title>Project 143</title>
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
		    <?php if ($_smarty_tpl->tpl_vars['userIsLogged']->value){?>
		    	<div id="logout">
					<a href="?action=logout">Logout</a>
				</div>
				<div id="userinfo">
		    		<a href="?action=userinfo"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a>
				</div>
				
			<?php }else{ ?>
				<div id="login">
		    		<a href="?action=login">Login</a>
				</div>
		  	<?php }?>
		    
	    </nav>
	    <nav id="bottomheader">
		    <a id="logo" href="?action=home"></a>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    <footer id="globalfooter">
		<p>This independent TEDx event is operated under license from TED.</p>
	</footer>
</body><?php }} ?>