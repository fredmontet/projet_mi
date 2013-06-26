{*
Smarty variables available:
	$videoIframe (iframe of the video)
	$isTalk (Object of Talk)
	$isEvent (Object of Event)
	$isSpeaker (Object of Speaker)
*}

<article>
    {$videoIframe}
    <h1>{if $isTalk != null}{$isTalk->getVideoTitle()}{/if}</h1>
    <time>{if $isEvent != null}{$isEvent->getStartingDate()|date_format:"%d %B %Y"}{/if}</time>
    <p>{if $isTalk != null}{$isTalk->getVideoDescription()}{/if}</p>
    <p><span>{if $isSpeaker != null}{$isSpeaker->getFirstname()}</span> <span>{$isSpeaker->getName()}{/if}</span></p>
</article>