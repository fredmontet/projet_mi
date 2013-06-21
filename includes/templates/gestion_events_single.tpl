{*
Smarty variables available:
	$event (Object)
	$location (Object) [0..1]
	$slots (Object) [0..1]
	$speakers (Array [Slot][Place][Speaker][Person]) [0..1]
*}

<article class="gestion_events_single">
    <form id="" method="post" action="">

        <!--gestion event single header-->
        <!--date-->
        <fieldset>
            <legend>date</legend>
            <input type="date" name="date" value="14april2013"/>
            <legend>title</legend>                    
            <input type="title" name="title" value="title of event" />
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
                <legend>Programme</legend>
                <textarea type="text" name="programme">Please edit programme if not already edited</textarea>
            </fieldset>

            <fieldset>
                <legend>Schedule</legend>
                <table>
                    <tr>
                        <td>13:00</td>
                        <td>Start</td>
                    </tr>
                    <tr>
                        <td>13:30</td>
                        <td>15:30</td>
                        <td><select>
                                <option>chose slot</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>17:00</td>
                        <td>End</td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>

        <!--navigation buttons-->
        <a href="#gestion_events_single_details">next</a>
        <!--end of gestion_events_single_infos-->

        <!--gestion_events_single_details-->
        <fieldset id="gestion_events_single_details">
            <fieldset>
                <legend>Location</legend>
                <select>
                    <option>Affect a location</option>
                </select>
            </fieldset>
            <fieldset>
                <legend>Dress code</legend>
                <textarea type="text">Please edit dress code if not already edited</textarea>
            </fieldset>
            <fieldset>
                <legend>Language</legend>
                <textarea type="text">Please edit language if not already edited</textarea>
            </fieldset>
        </fieldset>
        <!--navigation buttons-->
        <a href="#gestion_events_single_infos">previous</a>
        <a href="#gestion_events_single_speaker">next</a>
        <!--end of gestion_events_single_details-->

        <!--gestion_events_single_speaker-->
        <fieldset id="gestion_events_single_speaker">

            <legend>Speaker of slot one</legend>
            <a href="?action=gestion_speaker_infos">
                <input type="text" name="speaker" value="Jean-Paul Gautier" />
            </a>
            {$gestionEventsSpeakerInfos}

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
        </fieldset>
        <!--add speaker button-->
        <input type="hidden" name="action" value="add_speaker_to_slot">
        <input type="submit" name="submit_speaker" value="Add speaker">
        <!--add slot button-->
        <input type="hidden" name="action" value="add_slot">
        <input type="submit" name="submit_slot" value="Add slot">
        <!--navigation buttons-->
        <a href="#gestion_events_single_details">previous</a>
        <a href="#gestion_events_single_team">next</a>

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
        <!--end of add organizer-->

    </form>
</article>

