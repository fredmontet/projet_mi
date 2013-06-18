<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 07:08:34
         compiled from "includes\templates\contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1879551bf16dd69a8b2-99597344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60c84743750cf924f7b92afc82d420f072caafcb' => 
    array (
      0 => 'includes\\templates\\contact.tpl',
      1 => 1371539169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1879551bf16dd69a8b2-99597344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51bf16dd8d3515_56360218',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51bf16dd8d3515_56360218')) {function content_51bf16dd8d3515_56360218($_smarty_tpl) {?>    </nav>
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