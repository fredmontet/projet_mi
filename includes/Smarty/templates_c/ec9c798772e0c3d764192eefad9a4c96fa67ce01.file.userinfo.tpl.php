<?php /* Smarty version Smarty-3.1.13, created on 2013-06-17 11:41:45
         compiled from "includes/templates/userinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14643152051beae0da66764-59398346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec9c798772e0c3d764192eefad9a4c96fa67ce01' => 
    array (
      0 => 'includes/templates/userinfo.tpl',
      1 => 1371461987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14643152051beae0da66764-59398346',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51beae0da993a6_58131749',
  'variables' => 
  array (
    'firstname' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51beae0da993a6_58131749')) {function content_51beae0da993a6_58131749($_smarty_tpl) {?>		<ul id="subnav">
			
		</ul>
    </nav>
</header>
<section id="content">
	<h1>User info</h1>
	<p><?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
</p>
</section><?php }} ?>