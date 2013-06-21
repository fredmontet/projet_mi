<article class="gestion_events_role_infos"> 
    <form id="" methode="post" action="">
        <fieldset>
            <p>
                <label for="event">Chose event</label>   
                <select>
                    <option>Chose event</option>
                </select>
            </p>
            <p>
                <label for="role">Event role name</label>   
                <input type="text" name="role" value="Event role name">
            </p> 
            <p>
                <label for="level">Chose level</label>   
                <select>
                    <option>Chose level</option>
                </select>
            </p>
        </fieldset>


        <!--button-->
        <form name="send" method="post" action="gestion_events_role_send">
            <input type="hidden" name="action" value="Save">
            <input type="submit" name="submit_send" value="Save">
        </form>


    </form>
</article>