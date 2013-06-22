{*
Smarty variables available:
	$event(object)
*}

<section class="gestion_events_list">
    {foreach from=$events item=event}
        <a href="?action=gestion_events_single&id={$event->getNo()}">
            <article>
                <h1>{$event->getMainTopic()}</h1>
                <p>{$event->getStartingDate()|date_format:"%d %B %Y"}</p>
                <!--ajouter le lien sur l'image-->
                <p>
                    <img src="" alt="Picture of a right arrow" />
                </p>
            </article>
        </a>
    {/foreach}
</section>