<nav class="events_nav">
    <ul>
        </li>
        {*foreach from=$events item=event*}
            <a href="?action=events_single&id={$event->getNo()}">
		<!--<h1>{*$events->getMainTopic()*}Title of event</h1>-->
		<h1>{*$events->getStartingDate()|date_format:"%d %B %Y"*}</h1>
		<!--<p>{*$events->getDescription()*}description</p>-->
                <!-- peut-être serait-il cool de rajouter un boutton sympathique? -->
            </a>
         {*/foreach*}
        </li>
    </ul>
</nav>