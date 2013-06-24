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
*}

<article class="gestion_events_role span12">
    <!--button new-->
    <a href="?action=gestion_events_role_new" class="theButton span12">New</a>
    <section class="span12">
    
    	{foreach from=$events item=event}
	    	<dl>
	            <dt>{$event.event->getMainTopic()}</dt>
	            {foreach from=$event.roles item=role}
    				<dd><a href="?action=gestion_events_role_infos&name={$role->getName()}&event={$role->getEventNo()}&organizer={$role->getOrganizerPersonNo()}">{$role->getName()}</a></dd>
				{/foreach}
	        </dl>
    	{/foreach}
    
    </section>
</article>


{$gestionEventsRoleInfos}