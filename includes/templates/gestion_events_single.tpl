<article class="gestion_event_single">

        <!--gestion event single header-->
        <header>
            <!--date-->
            <h1><input type="text" value="14 april 2013" name="gestion_event_date" style="width:200px" /></h1>
            <!--event title-->
            <h1><input type="text" value="Title of event" name="gestion_event_title" style="width:200px" /></h1>
            <!--single nav -->
            <nav class="event_nav">
                <a href="#gestion_event_single_infos">Infos</a>
                <a href="#gestion_event_single_details">Details</a>
                <a href="#gestion_event_single_speaker">Speaker</a>
                <a href="#gestion_event_single_team">Team</a>  
            </nav>
        </header>
        <!--end gestion event single header-->
            
        
    <!--infos tab-->
    <section id="gestion_event_single_infos">
        
        <!--location tab-->
        <section>
                <h2>Location</h2>
                <select name="location" size="1">
                    <option>Renens</option>
                    <option>Lausanne</option>
                    <option>Morges</option>
                    <option>...</option>
                </select> 
        </section>
        
        <!--schedule tab-->
        <section>
                <h2>Schedule</h2>
                <dl>
                    <dt><input type="text" value="13:00" name="gestion_event_scheldule" style="width:200px" /></dt>
                        <dd><input type="text" value="Registration" name="gestion_event_slot" style="width:200px" /></dd>   
                </dl>
                <dl>
                    <dt><input type="text" value="13:30 - 15:30" name="gestion_event_scheldule" style="width:200px" /></dt>
                        <dd><input type="text" value="Slot One" name="gestion_event_slot" style="width:200px" /></dd>   
                </dl>
                <dl>
                    <dt><input type="text" value="16:30 - 18:30" name="gestion_event_scheldule" style="width:200px" /></dt>
                        <dd><input type="text" value="Slot Two" name="gestion_event_slot" style="width:200px" /></dd>   
                </dl>
                <dl>
                    <dt><input type="text" value="19:30" name="gestion_event_scheldule" style="width:200px" /></dt>
                        <dd><input type="text" value="Closing" name="gestion_event_slot" style="width:200px" /></dd>   
                </dl>
                
                <!--add slot button-->           
                <button type="button" onclick="">Add a slot</button>
        </section>
        
        <!--programm tab-->
        <section>
            <h2>Programme</h2>
            <p><textarea rows="12" cols="70">description program blablalalalblblblblba</textarea></p>
        </section>
    </section>
    <!--end infos tab-->
        
    
    <!--details tab-->
    <section id="gestion_event_single_details">
        <!--language-->
        <section>
            <h2>Languages</h2>
            <p><textarea rows="6" cols="60">blbla english blblabla</textarea></p>
        </section>
    
        <!--dress code-->
        <section>
            <h2>Dress Code</h2>
            <p><textarea rows="8" cols="70">blbalablblablaabl</textarea></p>
        </section>
    </section>
    <!--end details tab-->
        
    
    <!--speaker tab-->
    <section id="gestion_event_single_speaker">
        <!--speaker slot-->
        <section>
            <h2>Speaker of slot one</h2>
            <ul>
                <li><input type="text" value="Jean Rouillé" name="gestion_event_speaker" style="width:200px"/></li>
            </ul>  
            <!--add speaker button-->           
            <div>
                <button type="button" onclick="">Add a speaker</button>
            </div>
            
            <h2>Speaker of slot two</h2>
            <ul>
                <li><input type="text" value="Henri Dunan" name="gestion_event_speaker" style="width:200px"/></li>  
            </ul>
            <!--add speaker button-->           
            <div>
                <button type="button" onclick="">Add a speaker</button>
            </div>
        </section>
    </section>
    <!--end speaker tab-->
    
    
    <!--team tab-->
    <section id="gestion_event_single_team">
        <section class="gestion_event_team">
        
        </section>          
    </section>
    <!--end team tab-->
    
    
    <!--Buttons-->   
    <section>
        <!--next button-->           
        <div>
            <button type="button" onclick="#details">Next</button>
        </div>
        <!--previous button-->    
        <div>
            <button type="button" onclick="#details">Previous</button>
        </div>
    </section>
    
</article>
