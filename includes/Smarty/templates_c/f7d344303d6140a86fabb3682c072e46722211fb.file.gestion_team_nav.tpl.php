<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 11:42:21
         compiled from "includes\templates\gestion_team_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1545751c15bff7402e1-79233594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7d344303d6140a86fabb3682c072e46722211fb' => 
    array (
      0 => 'includes\\templates\\gestion_team_nav.tpl',
      1 => 1371634926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1545751c15bff7402e1-79233594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c15bff741294_49419364',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c15bff741294_49419364')) {function content_51c15bff741294_49419364($_smarty_tpl) {?><nav>
	<h1>Team Role</h1>
	<ul>
	    <li><a href="?action=gestion_team_affect">Affect team role</a></li>
	    <li><a href="?action=gestion_team_edit">Edit team role</a></li>
	</ul>
</nav>
<?php }} ?>