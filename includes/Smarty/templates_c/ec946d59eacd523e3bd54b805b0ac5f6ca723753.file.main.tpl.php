<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 06:12:26
         compiled from "includes/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115340244551c02b2f5d9542-94082601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec946d59eacd523e3bd54b805b0ac5f6ca723753' => 
    array (
      0 => 'includes/templates/main.tpl',
      1 => 1371615108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115340244551c02b2f5d9542-94082601',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c02b2f66b4d3_45353338',
  'variables' => 
  array (
    'topAction' => 0,
    'userIsLogged' => 0,
    'username' => 0,
    'subnav' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c02b2f66b4d3_45353338')) {function content_51c02b2f66b4d3_45353338($_smarty_tpl) {?><!Doctype html>
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
			    <li id="gn-about"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='about'){?>class="selected"<?php }?> href="?action=about">About</a></li>
			    <li id="gn-events"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='events'){?>class="selected"<?php }?> href="?action=events">Events</a></li>
			    <li id="gn-videos"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='videos'){?>class="selected"<?php }?> href="?action=videos">Videos</a></li>
			    <li id="gn-partners"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='partners'){?>class="selected"<?php }?> href="?action=partners">Partners</a></li>
				<li id="gn-press"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='press'){?>class="selected"<?php }?> href="?action=press">Press</a></li>
				<li id="gn-contact"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='contact'){?>class="selected"<?php }?> href="?action=contact">Contact</a></li>
				<li id="gn-gestion"><a <?php if ($_smarty_tpl->tpl_vars['topAction']->value=='gestion'){?>class="selected"<?php }?> href="?action=gestion">Gestion</a></li>
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
		    
		    <!-- Display the subnav if there is -->
		    <?php echo $_smarty_tpl->tpl_vars['subnav']->value;?>

	    </nav>
    </header>
    
    <section id="content" class="<?php echo $_smarty_tpl->tpl_vars['topAction']->value;?>
">
    
		    <!-- Display the content of all page -->
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

			
    </section>
    
    <footer id="globalfooter">
		<p>This independent TEDx event is operated under license from TED.</p>
	</footer>
</body><?php }} ?>