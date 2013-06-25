{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
	$errorFormMessage (Array of error Formular message)
	$errorState (Array of status about uncorrect values)
	$isTeamRole (Object of TeamRole)
*}

<section class="gestion_contacts_role_infos span8">
    <form method="post" action="">
        <fieldset>
        <p>
            <input type="hidden" name="id" value="{$isTeamRole->getName()}" />
            <input type="hidden" name="action" value="gestion_contacts_role_infos" />
            <input type="submit" name="update" value="Save" />
        </p>
        <h1>Team role</h1>             
        <p>
            <label for="teamrole">Name</label>
            <input type="text" name="teamrole" value="{$isTeamRole->getName()}"/>
        </p>
        </fieldset>
    </form>
</section>