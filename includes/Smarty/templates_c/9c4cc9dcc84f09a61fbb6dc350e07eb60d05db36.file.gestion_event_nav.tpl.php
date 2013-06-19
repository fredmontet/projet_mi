<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 06:33:49
         compiled from "includes/templates/gestion_event_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11460523051c0b3b18c0027-51731691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c4cc9dcc84f09a61fbb6dc350e07eb60d05db36' => 
    array (
      0 => 'includes/templates/gestion_event_nav.tpl',
      1 => 1371616223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11460523051c0b3b18c0027-51731691',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c0b3b18d8539_81315446',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c0b3b18d8539_81315446')) {function content_51c0b3b18d8539_81315446($_smarty_tpl) {?><nav>
    <h1>Event</h1>
    <ul>
        <li><a href="?action=event">All events</a></li>
        <li><a href="?action=createAnEvent">Create an event</a></li>
        <li><a href="?action=waitingList">Waiting list</a></li>
        <li><a href="?action=mailingList">Mailing list</a>   </li>
        <li><a href="?action=eventRole">Event role</a></li>
   </ul>
</nav><?php }} ?>