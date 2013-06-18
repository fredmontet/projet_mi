<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 09:00:01
         compiled from "includes\templates\gestion_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2345351c01ef9c5d365-06061539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7e470cfb4eb4c12c399c4b46685cd3fc600cc03' => 
    array (
      0 => 'includes\\templates\\gestion_event.tpl',
      1 => 1371545999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2345351c01ef9c5d365-06061539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c01ef9cd6109_51717688',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c01ef9cd6109_51717688')) {function content_51c01ef9cd6109_51717688($_smarty_tpl) {?><!--subnav-->

<ul id="subnav">
            <li class="sn-event"><a href="#event">Event</a></li>
            <li class="sn-speaker"><a href="#speaker">Speaker</a></li>
            <li class="sn-location"><a href="#location">Location</a></li>
            <li class="sn-teamRole"><a href="#teamRole">Team role</a></li>
        </ul>
    </nav>
</header>

<!--gestion event nav-->

<section id="content" class="getion_event">
   
    <nav>
        <h1>Event</h1>
        <a href="#allEvent">All events</a>
        <a href="#createAnEvent">Create an event</a>
        <a href="#waitingList">Waiting list</a>
        <a href="#mailingList">Mailing list</a>   
        <a href="#eventRole">Event role</a>   
    </nav>

    <!--event line-->

    <section id="eventLine">

        <article>
            <h1>Title of event</h1>
            <p>21 february 2013</p>
            <p><img src="arrow.png"/></p>
        </article>

    </section>

</section><?php }} ?>