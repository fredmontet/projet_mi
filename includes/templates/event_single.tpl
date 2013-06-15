<section>
    <article class="event_single">
     
    <!--event header-->
    
            <header>
                <p class="event_date">{event_date}</p>
                <h1 class="event_title">{event_title}</h1>
                
                <nav class="event_nav">
                    <a href="#info">Info</a>
                    <a href="#details">Details</a>
                    <a href="#speaker">Speaker</a>   
                </nav>
            </header>
            
                
    <!--info tab-->
        <section id="info">
            <section class="event_schedule">
                <h2 class="event_schedule_title">{event_schedule_title}</h2>
                <dl class="event_schedule_slots">
                    <dt>{slot_time}</dt><dd>{slot_desc}</dd>              
                </dl>            
            </section>
            
            <section class="event_programm">
                <h2 class="event_programm_title">{event_programme_title}</h2>
                <p class="event_programm_desc">{event_programm_desc}</p>
            </section>
        </section>
            
    <!--details tab-->
        <div id="details">
            <section class="event_lang">
                <h2 class="event_lang_title">{event_lang_title}</h2>
                <p class="event_lang_desc">{event_lang_desc}</p>
            </section>
            
            <section class="event_dresscode">
                <h2 class="event_dresscode_title">{event_dresscode_title}</h2>
                <p class="event_dresscode_desc">{event_dresscode_desc}</p>
            </section>
        </div>
            
            
     <!--speaker tab-->
        <div id="speaker">
            <section class="event_speaker">
                <h2 class="event_speaker_title">{event_speaker_title}</h2>
                <ul class="event_speaker_listbyslot">
                    <li>{slot_speaker_name}</li>              
                </ul>            
            </section>
        </div>
     
     <!--registration button-->           
            <button type="button" onclick="alert("Hello world!")">Registration</button>
            
            
      </article>
</section>
