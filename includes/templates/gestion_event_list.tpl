<section>
	{foreach from=$events item=event}
	    <a href="?action=gestion_event_single&id={$event->getNo()}">
	        <article>
	            <h1>{$event->getMainTopic()}</h1>
	            <p>21 february 2013</p>
	            <div>"Picture of a right arrow"</div>
	        </article>
	    </a>
    {/foreach}
</section>