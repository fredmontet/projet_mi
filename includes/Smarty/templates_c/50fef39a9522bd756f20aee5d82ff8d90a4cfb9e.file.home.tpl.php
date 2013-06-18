<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 11:42:45
         compiled from "includes\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3103851c047b525b623-41593355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50fef39a9522bd756f20aee5d82ff8d90a4cfb9e' => 
    array (
      0 => 'includes\\templates\\home.tpl',
      1 => 1371539169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3103851c047b525b623-41593355',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'home_event' => 0,
    'home_videos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c047b526a6a1_45415472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c047b526a6a1_45415472')) {function content_51c047b526a6a1_45415472($_smarty_tpl) {?>		<ul id="subnav">
			
		</ul>
    </nav>
</header>
<section id="content">
	<?php echo $_smarty_tpl->tpl_vars['home_event']->value;?>

	<?php echo $_smarty_tpl->tpl_vars['home_videos']->value;?>

</section><?php }} ?>