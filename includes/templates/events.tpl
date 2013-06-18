    </nav>
</header>
<section id="content">
	<h1>Welcome at events page</h1>
	{foreach from=$events item=event}
		<article>
			<h1>{$event->getMainTopic()}</h1>
			<p>{$event->getStartingDate()}</p>
			<p>{$event->getDescription()}</p>
		</article>
	{/foreach}
</section>