
{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
	$errorFormMessage (Array of error Formular message)
	$errorState (Array of status about uncorrect values)
*}

<article class="gestion_contacts_role offset1 span10">
    <section class="span4">
        <header>  
        <a class="buttonRole" href="?action=gestion_contacts_role_new">New</a>
        </header>
        
        <h1>Actual team role</h1>     
        <ul> 
            {foreach from=$teamRoles item=teamRole}
                <li><a href="?action=gestion_contacts_role_infos&id={$teamRole->getName()}">{$teamRole->getName()}</a></li> 
            {/foreach}
       </ul>
    </section>
    {$gestionContactsRoleInfos}
</article>
