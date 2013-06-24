{*
Smarty variables available:
$registrations (Array [Registrations] => Array
(	
[Registration] => Registration Object
[Person] => Person Object
)
) [0..1]
*}
<article class="gestion_events_mail span12">   

    <!--list participants tab-->
    <section>
        <!--mail nav -->
        <nav class="gestion_events_mail_nav offset2 span6">
            <a href="#refused">Refused</a>
            <a href="#waiting">Waiting</a>
            <a href="#accepted">Accepted</a>
        </nav>

        <div class="span6">
            <section id="refused">

                {foreach from=$registrations item=registration}
                    <ul>
                        <li><a href="?action=gestion_events_mail_edit">
                                {$registration.person->getName()}
                                {$registration.person->getFirstName()}
                                <div>{$registration.registration->getStatus()}</div>
                            </a>
                        </li>
                    </ul>
                {foreachelse}
                    <p>There is no entry</p>
                {/foreach}
        </div>
    </section>
    <!--end list participants tab-->

    {$gestionEventsMailEdit}

</article>