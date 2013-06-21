{*
Smarty variables available:
	$subAction (String)
*}

<!--menu navigation of gestion pages-->
<ul id="subnav" class="gestion_nav">
    <li><a {if $subAction==gestion_events}class"selected"{/if} href="?action=gestion_events">Event</a></li>
    <li><a {if $subAction==gestion_locations}class"selected"{/if} href="?action=gestion_locations">Locations</a></li>
    <li><a {if $subAction==gestion_contacts}class"selected"{/if} href="?action=gestion_contacts">Contacts</a></li>
</ul>

