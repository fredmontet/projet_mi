{*
Smarty variables available:
	$event (Object)
	$location (Object) [0..1]
	$slots (Object) [0..1]
	$speakers (Array [Slot][Place][Speaker][Person]) [0..1]
*}

<article class="events_single">
 
    <!--event header-->
    <header>
        <h1>{$event->getMainTopic()}</h1>
        <h1>{$event->getStartingDate()|date_format:"%d %B %Y"}</h1>

        <nav>
            <a href="#events_single_infos">Infos</a>
            <a href="#events_single_details">Details</a>
            <a href="#events_single_speakers">Speaker</a>   
        </nav>
    </header>
       
            
    <!--infos tab-->
    <section id="events_single_infos">
         <!--event tab-->
        <section>
            <h2>Programme</h2>
            <p>{$event->getDescription()}</p>
        </section>
        <!--end event tab-->
        <!-- schedule tab-->
        <section>
                <h2>Schedule</h2>
                <dl>
                    <dt>{$event->getStartingTime()|date_format:"%R"}</dt>
                        <dd>Starting</dd>
                        
                        {foreach from=$slots item=slot}
                            <dt>{$slot->getStartingTime()|date_format:"%R"}-{$slot->getEndingTime()|date_format:"%R"}</dt>
                            <dd>Slot {$slot->getNo()} </dd>
                        {/foreach}
                        
                    <dt>{$event->getEndingTime()|date_format:"%R"}</dt>
                        <dd>Closing</dd>  
                </dl>
        </section>
        <!--end schedule tab-->  
    </section>
    <!--end infos tab-->
        
    
    <!--details tab-->
    <section id="events_single_details">
        {if ($location != null)}
        <!-- location tab-->
        <section>
                <h2>Location</h2>
                <p>{$location->getAddress()}</p>
                <p>{$location->getCity()}</p> 
        </section>
        <!--end location tab-->
        {/if}
        <!--dress code-->
        <section>
            <h2>Dress Code</h2>
            <p>This is the dress code</p>
        </section>
        <!--end dress code-->
        <!--language-->
        <section>
            <h2>Languages</h2>
            <p>blbla english blblabla</p>
        </section>
        <!--end language-->
    </section>
    <!--end section tab-->
        
        
    <!--speaker tab-->
    <section id="events_single_speakers">
        <!--speaker slot-->
        <section>
            <h2>Speaker of slot one</h2>
            <ul>
                <li>Jean-Paul Savary</li>
            </ul> 
            
            {foreach from=$speakers item=places}
            	{foreach from=$places item=speaker}
            		{foreach from=$speaker item=person}
            			{if $person!=null}{$person->getName()}{/if}
            		{/foreach}
            	{/foreach}
            {/foreach}           
        </section>
        <!--end speaker slot-->            
    </section>
    <!--end speaker tab-->
 
    
    <!--registration button-->           
    <a href="?action=events_registration&id=1">Registration</a>
    <!--end registration button-->
     
</article>
