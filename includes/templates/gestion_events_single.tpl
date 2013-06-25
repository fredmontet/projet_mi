{*
    Smarty variables available:
    $event (Object)
    $isLocation (Object) [0..1]
    $slots (Object) [0..1]
    $speakers (Array [Slot][Place][Speaker][Person]) [0..1]
    $gestionEventsSpeakerInfos (HTML from gestion_events_speaker_infos)
    $locations (Array of Location) [0..1]
    $errorFormMessage (Array of error Formular message)
*}

<article class="gestion_events_single">
    <form id="" method="post" action="">
        <!--gestion_events_single subnav -->
        <nav class="offset3 span6">
            <ul>
                <li><a href="#gestion_events_single_infos">Infos</a></li>
                <li><a href="#gestion_events_single_details">Details</a></li>
                {if $event != null}<li><a href="#gestion_events_single_speaker">Speaker</a></li>{/if}
                <li><a href="#gestion_events_single_team">Team</a></li>  
                <li><a href="?action=gestion_event_export">Export</a></li>
            </ul>
        </nav>

        <!--button save-->
        <div class="span12">
            {if $event != null}<input type="hidden" name="id" value="{$event->getNo()}" />{/if}
            <input type="hidden" name="action" value="gestion_events_single" />
            <input type="submit" name="update" value="Save" />
        </div>

        <div class="offset1 span10">
            <!--date-->
            <fieldset id="gestion_events_single_infos">
                <legend>Starting date</legend>
                <input type="date" name="startingDate" value="{$event->getStartingDate()}"/>
                {if $errorState != null && !$errorState.startingDate}<p class="errorvalue">{$errorFormMessage.startingDate}</p>{/if}
                <!--problem with css solved with this div-->
                <div id="troll">
                    <legend>Ending date</legend>
                    <input type="date" name="endingDate" value="{$event->getEndingDate()}"/>
                    {if $errorState != null && !$errorState.endingDate}<p class="errorvalue">{$errorFormMessage.endingDate}</p>{/if}
                </div>
                
                <legend>Title</legend>                    
                <input type="title" name="mainTopic" value="{$event->getMainTopic()}" />
                {if $errorState != null && !$errorState.mainTopic}<p class="errorvalue">{$errorFormMessage.mainTopic}</p>{/if}
                <div id="troll">
                    <legend>Programme</legend>
                    <textarea type="text" name="description">{$event->getDescription()}</textarea>
                    {if $errorState != null && !$errorState.description}<p class="errorvalue">{$errorFormMessage.description}</p>{/if}
                </div>

                <legend>Schedule</legend>
                <table>
                    <tr>
                        <td></td>
                        <td><input type="time" name="startingTime" value="{$event->getStartingTime()}" /></td>
                        <td>Start</td>
                        {if $errorState != null && !$errorState.startingTime}<p class="errorvalue">{$errorFormMessage.startingTime}</p>{/if}
                    </tr>
                    <tr>
                        <td><input type="time" name="slot1StartingTime" value="" /></td>
                        <td><input type="time" name="slot1EndingTime" value="" /></td>
                        <td>Slot One</td>
                        {if $errorState != null && !$errorState.slot1StartingTime}<p class="errorvalue">{$errorFormMessage.slot1StartingTime}</p>{/if}
                        {if $errorState != null && !$errorState.slot1EndingTime}<p class="errorvalue">{$errorFormMessage.slot1EndingTime}</p>{/if}
                    </tr>
                    <tr>
                        <td><input type="time" name="slot2StartingTime" value="" /></td>
                        <td><input type="time" name="slot2EndingTime" value="" /></td>
                        <td>Slot Two</td>
                        {if $errorState != null && !$errorState.slot2StartingTime}<p class="errorvalue">{$errorFormMessage.slot2StartingTime}</p>{/if}
                        {if $errorState != null && !$errorState.slot2EndingTime}<p class="errorvalue">{$errorFormMessage.slot2EndingTime}</p>{/if}
                    </tr>
                    <tr>
                        <td><input type="time" name="slot3StartingTime" value="" /></td>
                        <td><input type="time" name="slot3EndingTime" value="" /></td>
                        <td>Slot Three</td>
                        {if $errorState != null && !$errorState.slot3StartingTime}<p class="errorvalue">{$errorFormMessage.slot3StartingTime}</p>{/if}
                        {if $errorState != null && !$errorState.slot3EndingTime}<p class="errorvalue">{$errorFormMessage.slot3EndingTime}</p>{/if}
                    </tr>
                    <tr>
                        <td><input type="time" name="slot4StartingTime" value="" /></td>
                        <td><input type="time" name="slot4EndingTime" value="" /></td>
                        <td>Slot Four</td>
                        {if $errorState != null && !$errorState.slot4StartingTime}<p class="errorvalue">{$errorFormMessage.slot4StartingTime}</p>{/if}
                        {if $errorState != null && !$errorState.slot4EndingTime}<p class="errorvalue">{$errorFormMessage.slot4EndingTime}</p>{/if}
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="time" name="endingTime" value="{$event->getEndingTime()}" /></td>
                        <td>End</td>
                        {if $errorState != null && !$errorState.endingTime}<p class="errorvalue">{$errorFormMessage.endingTime}</p>{/if}
                    </tr>
                </table>
            </fieldset>

            <!--
            <input type="hidden" name="action" value=""/>
            <input type="submit" name="add_slot" value="Add a slot" />
            -->
            
            <a href="#gestion_events_single_details">next</a>

            <!--end of gestion_events_single_infos-->

            <!--gestion_events_single_details-->
            <fieldset id="gestion_events_single_details">
                <legend>Location</legend>
                <select name="locationName">
                    <option value="noLocation">no location</option>
                    
                    {foreach from=$locations item=location}
                        <option {if $isLocation->getName() == $location->getName()}selected{/if} value="{$location->getName()}">{$location->getName()}</option>
                    {/foreach}
                </select>
                {if $errorState != null && !$errorState.locationName}<p class="errorvalue">{$errorFormMessage.locationName}</p>{/if}
            </fieldset>
            <!--navigation buttons-->
            <a href="#gestion_events_single_infos">previous</a>
            <a href="#gestion_events_single_speaker">next</a>
            <!--end of gestion_events_single_details-->
        </div>
        
        {if $event != null}
            <fieldset id="gestion_events_single_speaker">
    
                
                {counter start=0 skip=1 print=false} 
                {foreach from=$speakers item=slot }
                        <legend>Slot n°{counter}</legend>
                        {if $slot.speakers != null}
                            {foreach from=$slot.speakers item=speaker}
                                <a href="?action=gestion_speaker_infos"><span>{$speaker->getFirstname()}</span> <span>{$speaker->getName()}</span></a>
                            {/foreach}
                        {/if}
                {/foreach}
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
        {/if}
        
        <input type="hidden" name="action2" value="add_speaker_to_slot">
        <input type="submit" name="submit_speaker" value="Add speaker">
        
        
        <input type="hidden" name="action3" value="add_slot">
        <input type="submit" name="submit_slot" value="Add slot">
        
        
        <a href="#gestion_events_single_details">previous</a>
        <a href="#gestion_events_single_team">next</a>
        
        

        
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
        
        <input type="hidden" name="action4" value="add_organizer_to_event">
        <input type="submit" name="submit_add" value="Add organizer">
        -->
        
        
        <a href="#gestion_events_single_speaker">previous</a>
        
    </form>
</article>

