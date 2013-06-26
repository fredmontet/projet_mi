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

<!--list of videos in the home page-->
<article class="videos_list span12">
    <div class="grey_bar_video"></div>
    <h1>Videos of our previous events</h1>
    <nav class="span1">
        <a class="previous" title="Previous"></a>
    </nav>
    <ul class="span10">
        {foreach from=$talks item=talk name=list}
            {if $smarty.foreach.list.index == 3}
                {break}
            {/if}
            <li><a href="?action=videos&eventId={$talk.talk->getEventNo()}&speakerId={$talk.talk->getSpeakerPersonNo()}"><img src="{$talk.imgURL}" /></a></li>
        {/foreach}     
    </ul>
    <nav class="span1">
        <a class="next" title="Next"></a>
    </nav>
</article>