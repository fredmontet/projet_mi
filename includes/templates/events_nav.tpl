<nav class="events_nav">
    <ul>
        </li>
        {foreach from=$events item=event}
            <a href="?action=event_single&id={$event->getNo()}">
		<h1>{$event->getMainTopic()}</h1>
		<p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
		<p>{$event->getDescription()}</p>
                <!-- peut-être serait-il cool de rajouter un boutton sympathique? -->
            </a>
         {/foreach}
        </li>
    </ul>
</nav>