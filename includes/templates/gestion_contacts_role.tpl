
{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
	$errorFormMessage (Array of error Formular message)
	$errorState (Array of status about uncorrect values)
*}

<article class="gestion_contacts_role offset2 span8">
    <header>  
        <a class="buttonRole" href="?action=gestion_contacts_role_new">New</a>
    </header>
    <ul> 
        <dl>
        	{foreach from=$teamRoles item=teamRole}
        		<dt><a href="?action=gestion_contacts_role_infos&id={$teamRole->getName()}">{$teamRole->getName()}</a></dt>
        	{/foreach}
        </dl> 
        <dl>
            <dt>Admin Staff</dt>  
            <dd>Receptionist</dd>
            <dd>Joker</dd>  
        </dl>
        <dl>
            <dt>RootName</dt>  
            <dd>Iron Man</dd>
            <dd>Jedi</dd>
            <dd>Water Man</dd>  
        </dl>
   </ul>
</article>
{$gestionContactsRoleInfos}