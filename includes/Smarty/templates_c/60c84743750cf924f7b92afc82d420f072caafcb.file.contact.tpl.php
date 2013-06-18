<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 07:45:53
         compiled from "includes\templates\contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1879551bf16dd69a8b2-99597344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60c84743750cf924f7b92afc82d420f072caafcb' => 
    array (
      0 => 'includes\\templates\\contact.tpl',
      1 => 1371541461,
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
    <article>
	<h1>Contact</h1>
            <form id="contact" method="post" action="xx.php">
    
            <!--name-->
            <p>
                <!--<label for="name">Name </label>-->
                <input type="text" name="user_name" value="Your name"style="width:200px" />
            </p>

            <p>
                <!--<label for="surname">Surname </label>-->
                <input type="text" name="user_surname" value="Your surname" style="width:200px"/>
            </p>

            <!--email-->
            <p>
                <!--<label for="email">Email </label>-->
                <input type="email" name="user_email" value="Your email" style="width:200px" />
            </p>

            <!--subject-->
            <p>
                <!--<label for="object">Object </label>-->
                <input type="text" name="user_subject" value="Your subject" style="width:200px" />
            </p>

            <!--message-->
            <p>
                <!--<label for="message">Message </label>-->
                <textarea type="text" name="user_message" rows="4" cols="26">Your message</textarea>
            </p>

            <!--submit--> 
            <p>
            <input type="submit" name="send" value="Send" />
            </p>
            
           </form>
    </article>
</section><?php }} ?>