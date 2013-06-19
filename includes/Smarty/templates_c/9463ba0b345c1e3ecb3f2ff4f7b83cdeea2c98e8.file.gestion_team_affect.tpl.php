<?php /* Smarty version Smarty-3.1.13, created on 2013-06-19 13:31:36
         compiled from "includes\templates\gestion_team_affect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2957451c15bff752ee5-24094246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9463ba0b345c1e3ecb3f2ff4f7b83cdeea2c98e8' => 
    array (
      0 => 'includes\\templates\\gestion_team_affect.tpl',
      1 => 1371641430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2957451c15bff752ee5-24094246',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c15bff753c32_58093884',
  'variables' => 
  array (
    'gestionTeamAffectInfos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c15bff753c32_58093884')) {function content_51c15bff753c32_58093884($_smarty_tpl) {?><article
    <header>
        <nav>
            <ul>
                <li><a href="#withteamrole">With team role</a></li>
                <li><a href="#withoutteamrole">Without team role</a></li>
                <div>New</div>
            </ul>
        </nav>
    </header>
    <ul> 
        <li> <span>PersonName</span> <span>title of event</span></li> 
   </ul>
</article>
<?php echo $_smarty_tpl->tpl_vars['gestionTeamAffectInfos']->value;?>
<?php }} ?>