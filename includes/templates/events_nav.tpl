<nav class="events_nav">
 <a href="#" class="previous">Previous</a>
 <a href="#" class="next">Next</a>
 
        
            
                
        {*foreach from=$events item=event}
            <a href="?action=events_single&id={$event->getNo()}">
                <h1>{$event->getMainTopic()}</h1>
                <time>{$event->getStartingDate()|date_format:"%d %B %Y"}</time>
            </a>
         {/foreach*}

</nav>