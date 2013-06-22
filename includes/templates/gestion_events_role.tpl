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

<article class="gestion_events_role">
    <!--button new-->
    <a href="?action=gestion_events_role_new">New</a>
    <section>
    
    	{foreach from=$events item=event}
	    	<dl>
	            <dt>{$event.event->getMainTopic()}</dt>
	            {foreach from=$event.roles item=role}
    				<dd><a href="?action=gestion_events_role_infos">{$role->getName()}</a></dd>
				{/foreach}
	        </dl>
    	{/foreach}
    
    </section>

    <!--button-->
    <form method="post" action="">
        <input type="hidden" name="action" value="gestion_events_role_send">
        <input type="submit" name="submit_send" value="Save">
    </form>
</article>


{$gestionEventsRoleInfos}