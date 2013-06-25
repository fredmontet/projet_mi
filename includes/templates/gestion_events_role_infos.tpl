{*
Smarty variables available:
	$events (Array [Events] => Array
		(	
			[Event] => Event Object
			[Roles] => Array
				(
					[Role] => Role Object
				)
		)
	) [0..1]
        
        $role (Role Object)
*}
<article class="gestion_event_role">
<form name="gestion_event_role" method="post" action="">
            <!--button save-->
    <fieldset>
            <input type="hidden" name="action" value="gestion_events_role_send" />
            <input type="submit" name="gestion_locations_send" value="Save" />
    </fieldset>
    <fieldset>
        <legend>Chose event</legend>   
        <select>
            <option value="{$role->getEventNo()}">Chose event</option>
            {foreach from=$events item=event}
                <option value="{$event.event->getNo()}">{$event.event->getMainTopic()}</option>
            {/foreach}
        </select>
    </fieldset>

    <fieldset>
        <legend>Event role name</legend>   
        <input type="text" name="role" value="{$role->getName()}" />
    </fieldset> 

    <fieldset>
        <legend>Chose level</legend>   
        <select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </fieldset>
</form>
</article>