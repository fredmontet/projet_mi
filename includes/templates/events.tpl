{foreach from=$events item=event}
	<article class="closed_event_single">
		<a href="?action=event_single&id={$event->getNo()}">
			<h1>{$event->getMainTopic()}</h1>
			<p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
			<p>{$event->getDescription()}</p>
		</a>  <!-- Arrow -->
	</article>
{/foreach}