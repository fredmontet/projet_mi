<section>
	{foreach from=$events item=event}
	    <a href="?action=gestion_event_single&id={$event->getNo()}">
	        <article>
	            <h1>{$event->getMainTopic()}</h1>
	            <p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
	            <div>"Picture of a right arrow"</div>
	        </article>
	    </a>
    {/foreach}
</section>