<article class="gestion_events_single">
    <form id=""method="post" action="">

        <!--gestion event single header-->
        <fieldset>
            <!--date-->
            <label for="date">
                <input type="time" value="14 april 2013" name="gestion_events_date" />
            </label>
            <!--event title-->
            <label for="title">
                <input type="text" value="Title of event" name="gestion_events_title" />
            </label>
        </fieldset>

        <!--button save-->
        <input type="hidden" name="action" value="gestion_events_send" />
        <input type="submit" name="submit_send" value="Save" />

        <!--single nav -->
        <nav class="gestion_events_nav">
            <a href="#gestion_events_single_infos">Infos</a>
            <a href="#gestion_events_single_details">Details</a>
            <a href="#gestion_events_single_speaker">Speaker</a>
            <a href="#gestion_events_single_team">Team</a>  
            <a href="?action=gestion_event_export">Export</a> 
        </nav>
        <!--end gestion event single header-->

        <!--gestion_events_single_infos-->
        <fieldset id="gestion_events_single_infos">
            <fieldset>
                <label for="programme">Programme</label>
                <textarea type="text" name="programme" rows="4" cols="26">Please edit programme if not already edited</textarea>
            </fieldset>

            <fieldset>
                <label for="schedule">Schedule</label>
                <table>
                    <tr>
                        <td>13:00</td>
                        <td>Start</td>
                    </tr>
                    <tr>
                        <td>13:30</td>
                        <td>15:30</td>
                        <td>Registration</td>
                    </tr>
                    <tr>
                        <td>17:00</td>
                        <td>End</td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>

        <!--add button-->
        <input type="hidden" name="action" value="add_slot">
        <input type="submit" name="submit_slot" value="Add a slot">

        <!--navigation buttons-->
        <a href="#gestion_events_single_details">next</a>
        <!--end of gestion_events_single_infos-->

        <!--gestion_events_single_details-->
        <fieldset id="gestion_events_single_details">
            <fieldset>
                <label for="location">Location</label>
                <select name="location">
                    <option>Affect a location</option>
                </select>
            </fieldset>
            <fieldset>
                <label for="dress">Dress code</label>
                <textarea type="text" name="dresscode" rows="4" cols="26">Please edit dress code if not already edited</textarea>
            </fieldset>
            <fieldset>
                <label for="language">Language</label>
                <textarea type="text" name="language" rows="4" cols="26">Please edit language if not already edited</textarea>
                </input>
            </fieldset>
        </fieldset>
        <!--navigation buttons-->
        <a href="#gestion_events_single_infos">previous</a>
        <a href="#gestion_events_single_speaker">next</a>
        <!--end of gestion_events_single_details-->

        <!--gestion_events_single_speaker-->
        <fieldset id="gestion_events_single_speaker">
            <p>
                <label for="speaker">Speaker of slot one</label>
                <a href="?action=gestion_speaker_infos&event_id=1&speaker_id=2">
                    <input type="text" name="speaker" value="Jean-Paul Gautier">
                </a>
                {$gestionEventsSpeakerInfos}
            </p>

            <p>
                <select>
                    <option>Chose a contact</option>
                </select>
            </p>
            <p>
                <select>
                    <option>Position</option>
                </select>
            </p>
            <p>
            <form name="add" method="post" action="add_speaker_to_slot">
                <input type="hidden" name="action" value="Add speaker">
                <input type="submit" name="submit_slot" value="Add speaker">
            </form>
            </p>
        </fieldset>
        <!--navigation buttons-->
        <a href="#gestion_events_single_team">previous</a>
        <a href="#gestion_events_single_details">next</a>
        <!--end of speaker-->

        <!--gestion_events_single_team-->
        <fieldset id="gestion_events_single_team">
            <legend>Organizer</legend>
            <p>
                <select>
                    <option>Jean-Paul Gautier</option>
                </select>
            </p>
            <p><input type="text" name="kw" value="Keyword 1" /></p>
            <p><input type="text" name="kw" value="Keyword 2" /></p>
            <p><input type="text" name="kw" value="Keyword 3" /></p>
            <p>
                <select>
                    <option>Role</option>
                </select>
            </p>
        </fieldset>
        <!--button-->
        <input type="hidden" name="action" value="add_organizer_to_event">
        <input type="submit" name="submit_add" value="Add organizer">
        
        <!--navigation buttons-->
        <a href="#gestion_events_single_speaker">previous</a>
        <!--end of add organizier-->

    </form>
</article>

