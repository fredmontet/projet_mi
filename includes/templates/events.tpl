{foreach from=$events item=event}
<<<<<<< HEAD
	<article class="event">
=======
	<article class="events">
>>>>>>> 530e7e216a89b5a25ae0aa1e96e47170b1e01433
		<a href="?action=event_single&id={$event->getNo()}">
			<h1>{$event->getMainTopic()}</h1>
			<p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
			<p>{$event->getDescription()}</p>
		</a>  <!-- Arrow -->
	</article>
{/foreach}