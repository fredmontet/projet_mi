<?php /* Smarty version Smarty-3.1.13, created on 2013-06-17 22:24:52
         compiled from "includes/templates/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104561315551bead744eaee2-85373918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dfbeb5ab4fbbe4c7fea2d26a1be25e51968c8e6' => 
    array (
      0 => 'includes/templates/contact.tpl',
      1 => 1371500670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104561315551bead744eaee2-85373918',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51bead7451e9c2_44265225',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bead7451e9c2_44265225')) {function content_51bead7451e9c2_44265225($_smarty_tpl) {?>    </nav>
</header>
<section id="content">
	<h1>Contact</h1>
            <form id="contact" method="post" action="xx.php">
    
    <!--name-->
    <p>
        <!--<label for="name">Name </label>-->
        <input type="text" name="name" value="Your name" />
    </p>
    
    <p>
        <!--<label for="surname">Surname </label>-->
        <input type="text" name="surname" value="Your surname" />
    </p>
    
    <!--email-->
    <p>
        <!--<label for="email">Email </label>-->
        <input type="email" name="user_email" value="Your email" />
    </p>
    
    <!--subject-->
    <p>
        <!--<label for="object">Object </label>-->
        <input type="text" name="subject" value="Your subject" />
    </p>

    <!--message-->
    <p>
        <!--<label for="message">Message </label>-->
        <input type="text" name="message" value="" />
    </p>
    
    <!--submit--> 
    <p>
    <input type="submit" name="send" value="Send" />
    </p>
    
    </form>
</section><?php }} ?>