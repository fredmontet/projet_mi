<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 15:52:20
         compiled from "includes/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48412475851c02b2f5b29c4-59837022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9638a5ce80871ea25f3d35201e147676a3ba2f6' => 
    array (
      0 => 'includes/templates/home.tpl',
      1 => 1371563417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48412475851c02b2f5b29c4-59837022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c02b2f5c4227_63909073',
  'variables' => 
  array (
    'event_single' => 0,
    'home_videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c02b2f5c4227_63909073')) {function content_51c02b2f5c4227_63909073($_smarty_tpl) {?>
    </nav>
</header>

<section id="content" class="home_infos">

    <nav>
        <ul>
            <li class="infos"><a href="#infos">Infos</a></li>
            <li class="details"><a href="#details">Details</a></li>
            <li class="speaker"><a href="#speaker">Speaker</a></li>
        </ul>
    </nav>

 
    <section id="content">
            <?php echo $_smarty_tpl->tpl_vars['event_single']->value;?>

            <?php echo $_smarty_tpl->tpl_vars['home_videos']->value;?>

    </section>

</section><?php }} ?>