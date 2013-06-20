<article class="gestion_events_single">
    <form id="" method="post" action="">

        <!--gestion event single header-->
        <header>
            <!--date-->
            <label for="date">
                <input type="time" value="14 april 2013" name="gestion_events_date" />
            </label>
            <!--event title-->
            <label for="title">
                <input type="text" value="Title of event" name="gestion_events_title" />
            </label>
            <!--single nav -->
            <nav class="gestion_events_nav">
                <a href="#gestion_events_single_infos">Infos</a>
                <a href="#gestion_events_single_details">Details</a>
                <a href="#gestion_events_single_speaker">Speaker</a>
                <a href="#gestion_events_single_team">Team</a>  
                <a href="?action=gestion_event_export">Export</a> 
            </nav>
        </header>
        <!--end gestion event single header-->
        <fieldset>
            <!--gestion_events_single_infos-->
            <fieldset id="gestion_events_single_infos">
                <fieldset>
                    <label for="programme">Programme</label>
                    <input type="text" name="programme" value="blblalablabl" />
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
                    </table
                    <p>
                        <input type="submit" name="add" value="Add a slot" />
                    </p>
                </fieldset>
            </fieldset>
            <!--end of gestion_events_single_infos-->

            <!--gestion_events_single_details-->
            <fieldset id="gestion_events_single_details">
                <fieldset>
                    <label for="location">Location</label>
                    <select name="location">
                        <option>Chose a location</option>
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
            <!--end of gestion_events_single_details-->

            <!--gestion_events_single_speaker-->
            <fieldset id="gestion_events_single_speaker">
                <fieldset>
                    <label for="speaker">Speaker of slot one</label>
                    <input type="text" name="speaker" value="Jean-Paul Gautier">
                </fieldset>
                
                <form name="speaker" method="post" action="?action=gestion_speaker_infos">
                    <input type="hidden" name="action" value="Jean-Paul Gautier">
                    <input type="submit" name="contact" value="Jean-Paul Gautier">
                </form>
                

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
                <form name="add" method="post" action="?action=add_speaker_to_slot">
                    <input type="hidden" name="action" value="Add slot">
                    <input type="submit" name="submit_slot" value="Add slot">
                </form>
                </p>
            </fieldset>
            <!--end of speaker-->

            <!--gestion_events_single_team-->
            <fieldset id="gestion_events_single_team">
                <label for="organizer">Organizer</label>
                <p><input type="text" name="speaker" value="Jean-Paul Gautier" /></p>
                <p>
                    <select>
                        <option>Role</option>
                    </select>
                </p>
                <p><input type="text" name="kw" value="Keyword 1" /></p>
                <p><input type="text" name="kw" value="Keyword 2" /></p>
                <p><input type="text" name="kw" value="Keyword 3" /></p>
                <p><input type="submit" name="add" value="add organizer"/></p>
            </fieldset>
            <!--end of speaker-->

            <!--button save-->
            <form name="send" method="post" action="?action=gestion_events_send">
                <input type="hidden" name="action" value="Save" />
                <input type="submit" name="submit_send" value="Save" />
            </form>

            <!--buttons next previous-->
            <p><input type="button" name="next" value="Next" </p>
            <p><input type="button" name="previous" value="Previous" /></p>

        </fieldset>
    </form>

</article>

