<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 16:05:44
         compiled from "includes/templates/gestion_event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39941330951c02b31c93464-04002460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1933077ec974055a64e290315b2fbe16f7edb982' => 
    array (
      0 => 'includes/templates/gestion_event.tpl',
      1 => 1371563417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39941330951c02b31c93464-04002460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c02b31ca08f4_64175501',
  'variables' => 
  array (
    'gestion_nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c02b31ca08f4_64175501')) {function content_51c02b31ca08f4_64175501($_smarty_tpl) {?>		<?php echo $_smarty_tpl->tpl_vars['gestion_nav']->value;?>

    </nav>
</header>

<section id="content" class="getion_event">
   
    <nav>
        <h1>Event</h1>
        <ul>
            <li><a href="?action=event">All events</a></li>
            <li><a href="?action=createAnEvent">Create an event</a></li>
            <li><a href="?action=waitingList">Waiting list</a></li>
            <li><a href="?action=mailingList">Mailing list</a>   </li>
            <li><a href="?action=eventRole">Event role</a> </li>
        
        </ul>          
    </nav>

    <!--event line-->

    <section id="eventLine">
        <a href="?action=gestion_event_infos">
            <article>
                <h1>Title of event</h1>
                <p>21 february 2013</p>
                <div>Arrow</div>
            </article>
        </a>
    </section>

</section><?php }} ?>