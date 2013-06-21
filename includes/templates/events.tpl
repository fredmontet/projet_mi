<<<<<<< HEAD
<section class="events">
<!--
Il faut faire cette page pour que, lorsqu'on clique sur event, dans la barre de menu,
on tombe sur l'event le plus récent. 

et, lorsqu'on clique sur un event dans la bar de sélection de l'event qui se trouve dans
la partie inférieur de la page, cela nous affiche l'event choisi.
-->

<!--Affichage de l'event-->
    {foreach from=$events item=event}
            {$event_single}
    {/foreach}

<!--bar de sélection de l'event à afficher-->
<nav>
    <ul>
        </li>
        {foreach from=$events item=event}
            <a href="?action=event_single&id={$event->getNo()}">
		<h1>{$event->getMainTopic()}</h1>
		<p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
		<p>{$event->getDescription()}</p>
            </a>  <!-- Arrow -->
        </li>
    </ul>
</nav>
<article class="events">
		<a href="?action=event_single&id={$event->getNo()}">
			<h1>{$event->getMainTopic()}</h1>
			<p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
			<p>{$event->getDescription()}</p>
		</a>  <!-- Arrow -->
	</article>
</section>
=======
{foreach from=$events item=event}
	{$event}
{/foreach}

{$events_nav}
>>>>>>> e2f269cff0144cf6acbb97813b15358dfc4d7c8a
