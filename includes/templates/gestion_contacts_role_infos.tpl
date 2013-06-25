{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
	$errorFormMessage (Array of error Formular message)
	$errorState (Array of status about uncorrect values)
	$isTeamRole (Object of TeamRole)
*}

<article class="gestion_contacts_role_infos">
        <form method="post" action="">
	        <p>
	        	<input type="hidden" name="id" value="{$isTeamRole->getName()}" />
	            <input type="hidden" name="action" value="gestion_contacts_role_infos" />
	            <input type="submit" name="update" value="Save" />
	        </p>
	        <h1>Create team role</h1>             
	        <p>
	            <label for="teamrole">Name of team role</label>
	            <input type="text" name="teamrole" value="{$isTeamRole->getName()}"/>
	        </p>
	        
	        <select name="newTeamRole" size="1">
	        	{foreach from=$teamRoles item=teamRole}
	        		<option value="{$teamRole->getName()}">{$teamRole->getName()}</option>
	        	{/foreach}
	        </select>
       </form>
</article>