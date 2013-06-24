{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
	$errorFormMessage (Array of error Formular message)
	$errorState (Array of status about uncorrect values)
*}

<article class="gestion_contacts_role">
    <header>  
        <a class="button" href="?action=gestion_contacts_role_new">New</a>
    </header>
    <ul> 
        <dl>
        	{foreach from=$teamRoles item=teamRole}
        		<dt><a href="?action=gestion_contacts_role_new">{$teamRole->getName()}</a></dt>
        	{/foreach}
        </dl> 
   </ul>
</article>
{$gestionContactsRoleInfos}