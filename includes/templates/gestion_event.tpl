<!--subnav-->

<ul id="subnav">
            <li class="sn-event"><a href="#event">Event</a></li>
            <li class="sn-speaker"><a href="#speaker">Speaker</a></li>
            <li class="sn-location"><a href="#location">Location</a></li>
            <li class="sn-teamRole"><a href="#teamRole">Team role</a></li>
        </ul>
    </nav>
</header>

<!--gestion event nav-->

<section id="content" class="getion_event">
   
    <nav>
        <h1>Event</h1>
        <a href="#allEvent">All events</a>
        <a href="#createAnEvent">Create an event</a>
        <a href="#waitingList">Waiting list</a>
        <a href="#mailingList">Mailing list</a>   
        <a href="#eventRole">Event role</a>   
    </nav>

    <!--event line-->

    <section>

        <article id="content">
                {foreach from=$events item=event}
                        <article>
                                <h1>{$event->getMainTopic()}</h1>
                                <p>{$event->getStartingDate()}</p>
                                <p>{$event->getDescription()}</p> <!--WTF ?-->
                                <p><img src="arrow.png"/></p>
                        </article>
                {/foreach}
        </article>

    </section>

</section>