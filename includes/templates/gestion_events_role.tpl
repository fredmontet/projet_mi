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

    {$gestionEventsRoleInfos}
    </form>
</article>