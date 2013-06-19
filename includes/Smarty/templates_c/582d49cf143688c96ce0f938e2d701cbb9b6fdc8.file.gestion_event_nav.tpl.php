<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 13:08:38
         compiled from "includes\templates\gestion_event_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3191851c15bf9a31ae1-66831943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '582d49cf143688c96ce0f938e2d701cbb9b6fdc8' => 
    array (
      0 => 'includes\\templates\\gestion_event_nav.tpl',
      1 => 1371634926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3191851c15bf9a31ae1-66831943',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c15bf9a342c7_22303061',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c15bf9a342c7_22303061')) {function content_51c15bf9a342c7_22303061($_smarty_tpl) {?><nav>
    <h1>Event</h1>
    <ul>
        <li><a href="?action=gestion_event_list">All events</a></li>
        <li><a href="?action=gestion_event_single">Create an event</a></li>
        <li><a href="?action=gestion_event_motivationt">Waiting list</a></li>
        <li><a href="?action=gestion_event_mail">Mailing list</a>   </li>
        <li><a href="?action=gestion_event_role">Event role</a></li>
   </ul>
</nav><?php }} ?>