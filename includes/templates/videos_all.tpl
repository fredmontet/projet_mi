{*
Smarty variables available:
	$talks (Array [Talks] => Array
		(	
			[Talk] => Talk Object
			[imgURL] => link to YouTube Thumbnail
			[Speaker] => Speaker Object
			[Event] => Event Object
		)
	) [0..1]
*}

<!--wall of all videos-->
<article class="videos_all">  

    {if $isTalk != null}
        {$video_player}
    {/if}
    {foreach from=$talks item=talk}
        <section>
            <a href="?action=videos&eventId={$talk.talk->getEventNo()}&speakerId={$talk.talk->getSpeakerPersonNo()}">
                <h1>{$talk.talk->getVideoTitle()}</h1>
                <time>{$talk.event->getStartingDate()|date_format:"%d %B %Y"}</time>
                <img src="{$talk.imgURL}" />
            </a>
        </section>
    {/foreach}  
</article>

