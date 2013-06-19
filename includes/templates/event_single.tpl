<article class="event_single">
 
<!--event header-->

        <header>
            <h1 class="event_date">{$event->getStartingDate()}</h1>
            <h1 class="event_title">{$event->getMainTopic()}</h1>
            
            <nav class="event_nav">
                <a href="#infos">Infos</a>
                <a href="#details">Details</a>
                <a href="#speaker">Speaker</a>   
            </nav>
        </header>
        
            
    <!--info tab-->
    <section id="infos">
        
        <!-- schedule tab-->
        <section class="event_schedule">
                <h2 class="event_schedule_title">Schedule</h2>
                <dl class="event_schedule_slots">
                    <dt>13:00</dt>
                        <dd>Registration</dd>   
                </dl>
        </section>
        <!--end schedule tab-->
        
        <!--event tab-->
        <section class="event_programm">
            <h2 class="event_programm_title">Programme</h2>
            <p class="event_programm_desc">{$event->getDescription()}</p>
        </section>
        <!--end event tab-->  
    </section>
    <!--end infos tab-->
        
    <!--details tab-->
    <section id="details">
        <!--language-->
        <section class="event_lang">
            <h2 class="event_lang_title">Languages</h2>
            <p class="event_lang_desc">blbla english blblabla</p>
        </section>
        <!--end language-->
    
        <!--dress code-->
        <section class="event_dresscode">
            <h2 class="event_dresscode_title">Dress Code</h2>
            <p class="event_dresscode_desc">blbalablblablaabl</p>
        </section>
        <!--end dress code-->
    </section>
    <!--end section tab-->
        
        
 <!--speaker tab-->
    <section id="speaker">
        <!--speaker slot-->
        <section class="event_speaker">
            <h2 class="event_speaker_title">Speaker of slot one</h2>
            <ul class="event_speaker_listbyslot">
                <li>Jean-Paul Savary</li>
            </ul>            
        </section>
        <!--end speaker slot-->            
    </section>
    <!--end speaker tab-->
 
    <!--registration button-->           
<<<<<<< HEAD
    <button type="button" onclick="alert("Hello world!")">Registration</button>
=======
    <div class="event_single"><a href="?action=event_registration&id=1">Registration</a></div>
    
>>>>>>> 810bde45890f65dcf1ffb852e828bf2415cf5728
    <!--end button-->
     
        
</article>
<!--end of event_single-->
