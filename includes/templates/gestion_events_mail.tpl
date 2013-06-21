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
                <li><a href="?action=events_mail_edit">Jean-Paul Gaucher REFUSED</a></li>
                <li><a href="?action=events_mail_edit">Jean Sanchez REFUSED</a></li>
                <li><a href="?action=events_mail_edit">Pierre Curie REFUSED</a></li>
            </ul>
        </section>

        <!--waiting tab-->
        <section id="waiting">
            <ul>
                <li><a href="?action=events_mail_edit">Marie Lise WAITING</a></li>
            </ul>
        </section>

        <!--accepted tab-->
        <section id="accepted">
            <ul>
                <li><a href="?action=events_mail_edit">john Doe ACCEPTED</a></li>
            </ul>
        </section>
    </section>
    <!--end list participants tab-->

    {$gestionEventsMailEdit}

</article>