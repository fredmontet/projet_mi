<article class="gestion_events_role">
    <form id="" method="post" action="">
        <fieldset>
            <table>
                <tr>
                    <th>title of event</th>
                </tr>
                <tr>
                    <td><a href="?action=gestion_events_role_info">caissier</a></td>
                </tr>
                <tr>
                    <td><a href="?action=gestion_events_role_info">éclairagiste</a></td>
                </tr>
            </table>
        </fieldset>

        <!--buttons-->
        <p>
        <form name="new" method="post" action="gestion_events_role_new">
              <input type="hidden" name="action" value="New">
              <input type="submit" name="new" value="New">
        </form>
        </p>

<<<<<<< HEAD
    {$gestionEventsRoleInfos}
=======
<<<<<<< HEAD
        {$gestion_contacts_role_infos}
=======
    {$gestionEventsRoleInfos}
>>>>>>> f91e3a45a3e366eabbae4a7e934cf5803623a9e3
>>>>>>> all actions added to gestion_events tpl
    </form>
</article>