<?php /* Smarty version Smarty-3.1.13, created on 2013-06-17 19:17:48
         compiled from "includes/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69274931351bdcefc9051d8-47739330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9638a5ce80871ea25f3d35201e147676a3ba2f6' => 
    array (
      0 => 'includes/templates/home.tpl',
      1 => 1371486991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69274931351bdcefc9051d8-47739330',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51bdcefc916411_45508979',
  'variables' => 
  array (
    'home_event' => 0,
    'home_videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bdcefc916411_45508979')) {function content_51bdcefc916411_45508979($_smarty_tpl) {?>		<ul id="subnav">
			
		</ul>
    </nav>
</header>
<section id="content">
	<?php echo $_smarty_tpl->tpl_vars['home_event']->value;?>

	<?php echo $_smarty_tpl->tpl_vars['home_videos']->value;?>

</section><?php }} ?>