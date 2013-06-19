{foreach from=$events item=event}
	<article class="closed_event_single">
		<h1{$event->getMainTopic()}</h1>
		<p>{$event->getStartingDate()}</p>
		<p>{$event->getDescription()}</p>
                    <p><img src="arrow.png"/></p>
	</article>
{/foreach}