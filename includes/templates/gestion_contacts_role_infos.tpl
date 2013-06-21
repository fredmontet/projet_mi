<article class="gestion_contacts_role_infos">
        <form method="post" action="">
                <!--save--> 
        <p>
            <input type="hidden" name="action" value="gestion_contacts_role_send" />
            <input type="submit" name="submit_send" value="Save" />
        </p>
        <h1>Create team role</h1>             
        <p>
            <label for="teamrole">Name of team role</label>
            <input type="text" name="teamrole" value="nameofTeamRole"/>
        </p>
        <select name="newTeamRole" size="1">
            <option>New TeamRole isMemberOf..||OR|| Is RootOf...</option>
            <option>Direction</option>
            <option>Admin staff</option>
            <option>Root name</option>
        </select>  

       </form>
</article>