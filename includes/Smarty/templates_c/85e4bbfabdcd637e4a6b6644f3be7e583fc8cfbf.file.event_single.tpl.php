<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 13:50:08
         compiled from "includes/templates/event_single.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181572725451c0490cb9de41-71328028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85e4bbfabdcd637e4a6b6644f3be7e583fc8cfbf' => 
    array (
      0 => 'includes/templates/event_single.tpl',
      1 => 1371556152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181572725451c0490cb9de41-71328028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c0490cc35a64_84722178',
  'variables' => 
  array (
    'event_date' => 0,
    'event_title' => 0,
    'event_schedule_title' => 0,
    'slot_time' => 0,
    'slot_desc' => 0,
    'event_programme_title' => 0,
    'event_programm_desc' => 0,
    'event_lang_title' => 0,
    'event_lang_desc' => 0,
    'event_dresscode_title' => 0,
    'event_dresscode_desc' => 0,
    'event_speaker_title' => 0,
    'slot_speaker_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c0490cc35a64_84722178')) {function content_51c0490cc35a64_84722178($_smarty_tpl) {?>
<article class="event_single">
 
<!--event header-->

        <header>
            <p class="event_date"><?php echo $_smarty_tpl->tpl_vars['event_date']->value;?>
</p>
            <h1 class="event_title"><?php echo $_smarty_tpl->tpl_vars['event_title']->value;?>
</h1>
            
            <nav class="event_nav">
                <a href="#info">Info</a>
                <a href="#details">Details</a>
                <a href="#speaker">Speaker</a>   
            </nav>
        </header>
        
            
<!--info tab-->
    <section id="info">
        <section class="event_schedule">
            <h2 class="event_schedule_title"><?php echo $_smarty_tpl->tpl_vars['event_schedule_title']->value;?>
</h2>
            <dl class="event_schedule_slots">
                <dt><?php echo $_smarty_tpl->tpl_vars['slot_time']->value;?>
</dt><dd><?php echo $_smarty_tpl->tpl_vars['slot_desc']->value;?>
</dd>              
            </dl>            
        </section>
        
        <section class="event_programm">
            <h2 class="event_programm_title"><?php echo $_smarty_tpl->tpl_vars['event_programme_title']->value;?>
</h2>
            <p class="event_programm_desc"><?php echo $_smarty_tpl->tpl_vars['event_programm_desc']->value;?>
</p>
        </section>
    </section>
        
<!--details tab-->
    <div id="details">
        <section class="event_lang">
            <h2 class="event_lang_title"><?php echo $_smarty_tpl->tpl_vars['event_lang_title']->value;?>
</h2>
            <p class="event_lang_desc"><?php echo $_smarty_tpl->tpl_vars['event_lang_desc']->value;?>
</p>
        </section>
        
        <section class="event_dresscode">
            <h2 class="event_dresscode_title"><?php echo $_smarty_tpl->tpl_vars['event_dresscode_title']->value;?>
</h2>
            <p class="event_dresscode_desc"><?php echo $_smarty_tpl->tpl_vars['event_dresscode_desc']->value;?>
</p>
        </section>
    </div>
        
        
 <!--speaker tab-->
    <div id="speaker">
        <section class="event_speaker">
            <h2 class="event_speaker_title"><?php echo $_smarty_tpl->tpl_vars['event_speaker_title']->value;?>
</h2>
            <ul class="event_speaker_listbyslot">
                <li><?php echo $_smarty_tpl->tpl_vars['slot_speaker_name']->value;?>
</li>              
            </ul>            
        </section>
    </div>
 
 <!--registration button-->           
        <button type="button" onclick="alert("Hello world!")">Registration</button>
        
        
  </article>
<?php }} ?>