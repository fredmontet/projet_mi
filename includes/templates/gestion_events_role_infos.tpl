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
<div class="span6">
<article class="gestion_events_role_infos">
    <form name="gestion_events_role_infos" method="post" action="">
            <!--button save-->
            <p>
                <input type="hidden" name="action" value="gestion_events_role_send" />
                <input type="submit" name="gestion_events_role_send" value="Save" />
            </p>

        <legend>Chose event</legend>   
        <select>
            <option value="{$role->getEventNo()}">Chose event</option>
            {foreach from=$events item=event}
                <option value="{$event.event->getNo()}">{$event.event->getMainTopic()}</option>
            {/foreach}
        </select>
        <legend>Event role name</legend> 
       <p>
        <input type="text" name="role" value="{$role->getName()}" />
       </p>
        <!--
        <legend>Chose level</legend>   
        <select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option> 
        </select>
        -->
 
    </form>
</article>
</div>