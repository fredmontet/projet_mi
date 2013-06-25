{*
    Smarty variables available:
    $speaker (Object)
    $keywords (Array of Object)
    $talks (Array of Object)
*}

<article class="gestion_events_speaker_infos">

    <h1><span>{$speaker->getFirstname()}</span> <span>{$speaker->getName()}</span></h1>
    
    <!--button-->
    <input type="hidden" name="id" value="{$speaker->getNo()}" />
    <input type="hidden" name="action" value="gestion_speaker_infos" />
    <input type="submit" name="update" value="Save" />
    
    
    <form method="post" action="">

        <fieldset>
            <legend>Keywords</legend>
            {assign var="i" value=1} 
            {foreach from=$keywords item=keyword}
                <input type="text" name="keyword{$i}" value="{$keyword->getValue()}" />
                {$i = $i+1}
            {/foreach}
            {for $foo=$i to 3 max=3}
                <input type="text" name="keyword{$foo}" value="" />
            {/for}
        </fieldset>
        <fieldset>
            <legend>Description</legend>
            <textarea>{$speaker->getDescription()}</textarea>
        </fieldset>
    
        <!--talk link-->
        
        {foreach from=$talks item=talk}
            <fieldset>
                <legend>Talk's video</legend>
                <label>Title</label>
                <input type="text" name="talk" value="{$talk->getVideoTitle()}" />
                
                <label>Description</label>
                <input type="text" name="talk" value="{$talk->getVideoDescription()}" />
                
                <label>URL</label>
                <input type="text" name="talk" value="{$talk->getVideoURL()}" />
            </fieldset>
        {/foreach}

    </form>
</article>