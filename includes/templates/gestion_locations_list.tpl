{*
Smarty variables available:
	$locations (Array of Object)
*}

<!--page with a list of the already existing locations -->
<article class="gestion_locations_list">
    <!--CSS button to create new location-->
    <a href="?action=gestion_locations_new">New</a>
    <!--Locations List-->    
    <ul>
    	{foreach from=$locations item=location}
    		<li><a href="?action=gestion_locations_infos&id={$location->getName()}">{$location->getName()}</a></li>
    	{/foreach}
    </ul>
    {$gestionLocationsInfos}
</article>