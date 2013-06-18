<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 16:15:37
         compiled from "includes\templates\events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3168451c06b89b0c0c8-74434847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1d41635545dc349f536893a419df816f3fe0795' => 
    array (
      0 => 'includes\\templates\\events.tpl',
      1 => 1371564791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3168451c06b89b0c0c8-74434847',
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
  'unifunc' => 'content_51c06b89c03618_97035754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c06b89c03618_97035754')) {function content_51c06b89c03618_97035754($_smarty_tpl) {?>    </nav>
</header>

<section id="content">
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
</p>
                        <p><img src="arrow.png"/></p>
		</article>
	<?php } ?>
</section><?php }} ?>