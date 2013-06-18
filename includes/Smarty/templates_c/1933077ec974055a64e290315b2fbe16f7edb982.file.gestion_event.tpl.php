<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 10:50:27
         compiled from "includes/templates/gestion_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35358717351c01f532ea739-15219363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1933077ec974055a64e290315b2fbe16f7edb982' => 
    array (
      0 => 'includes/templates/gestion_event.tpl',
      1 => 1371545422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35358717351c01f532ea739-15219363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c01f53343340_76046914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c01f53343340_76046914')) {function content_51c01f53343340_76046914($_smarty_tpl) {?><!--subnav-->

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

    <section>

        <article id="content">
                <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
                        <article>
                                <h1><?php echo $_smarty_tpl->tpl_vars['event']->value->getMainTopic();?>
</h1>
                                <p><?php echo $_smarty_tpl->tpl_vars['event']->value->getStartingDate();?>
</p>
                                <p><?php echo $_smarty_tpl->tpl_vars['event']->value->getDescription();?>
</p> <!--WTF ?-->
                                <p><img src="arrow.png"/></p>
                        </article>
                <?php } ?>
        </article>

    </section>

</section><?php }} ?>