<article class="gestion_events_mail">   

    <!--list participants tab-->
    <section>
        <!--mail nav -->
        <nav class="gestion_events_mail_nav">
            <a href="#refused">Refused</a>
            <a href="#waiting">Waiting</a>
            <a href="#accepted">Accepted</a>
        </nav>

        <!--refused tab-->
        <section id="refused">
            <ul>
                <li>Jean-Paul Gaucher REFUSED</li>
                <li>Jean-Paul Gaucher REFUSED</li>
                <li>Jean-Paul Gaucher REFUSED</li>
                <li>Jean-Paul Gaucher REFUSED</li>
            </ul>
        </section>

        <!--waiting tab-->
        <section id="waiting">
            <ul>
                <li>Marie Lise WAITING</li>
                <li>Marie Lise WAITING</li>
                <li>Marie Lise WAITING</li>
                <li>Marie Lise WAITING</li>
            </ul>
        </section>

        <!--accepted tab-->
        <section id="accepted">
            <ul>
                <li>John Doe ACCEPTED</li>
                <li>John Doe ACCEPTED</li>
                <li>John Doe ACCEPTED</li>
                <li>John Doe ACCEPTED</li>
            </ul>
        </section>
    </section>
    <!--end list participants tab-->
   
<!--Buttons-->   
    <article>
        <!--next button-->           
            <button type="button" onclick="gestion_events_role">Next</button>
        </div>
        <!--previous button-->    
        <div>
            <button type="button" onclick="gestion_events_motivation">Previous</button>
        </div>
    </article>
    
    {$gestionEventsMailEdit}

</article>