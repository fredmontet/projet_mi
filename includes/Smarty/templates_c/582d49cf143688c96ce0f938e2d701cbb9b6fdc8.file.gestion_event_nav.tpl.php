<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 07:21:29
         compiled from "includes\templates\gestion_event_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3191851c15bf9a31ae1-66831943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '582d49cf143688c96ce0f938e2d701cbb9b6fdc8' => 
    array (
      0 => 'includes\\templates\\gestion_event_nav.tpl',
      1 => 1371625794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3191851c15bf9a31ae1-66831943',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c15bf9a342c7_22303061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c15bf9a342c7_22303061')) {function content_51c15bf9a342c7_22303061($_smarty_tpl) {?><nav>
    <h1>Event</h1>
    <ul>
        <li><a href="?action=event">All events</a></li>
        <li><a href="?action=createAnEvent">Create an event</a></li>
        <li><a href="?action=waitingList">Waiting list</a></li>
        <li><a href="?action=mailingList">Mailing list</a>   </li>
        <li><a href="?action=eventRole">Event role</a></li>
   </ul>
</nav><?php }} ?>