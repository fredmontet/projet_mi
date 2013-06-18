<?php /* Smarty version Smarty-3.1.13, created on 2013-06-18 16:15:43
         compiled from "includes\templates\contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:952451c06b8f72dde1-05653732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60c84743750cf924f7b92afc82d420f072caafcb' => 
    array (
      0 => 'includes\\templates\\contact.tpl',
      1 => 1371564791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '952451c06b8f72dde1-05653732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c06b8f775487_50731380',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c06b8f775487_50731380')) {function content_51c06b8f775487_50731380($_smarty_tpl) {?>    </nav>
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