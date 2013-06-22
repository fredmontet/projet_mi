{*
Smarty variables available:
	$registrations (Array [Registrations] => Array
		(	
			[Registration] => Registration Object
			[Person] => Person Object
			[Motivations] => Array
				(
					[Motivation] => Motivation Object
				)
		)
	) [0..1]
*}
<section class="gestion_events_motivation">

	
	{foreach from=$registrations item=registration}
		<p>
			{$registration.person->getName()}
			{$registration.registration->getStatus()}
			{foreach from=$registration.motivations item=motivation}
				{$motivation->getText()}
			{foreachelse}
			
			{/foreach}
			
		</p>
	{foreachelse}
	<p>There is no entry</p>
	{/foreach}


    <article>
        <h1>Jean-Paul Gaucher</h1>
        <p>
            Nam auctor pellentesque diam, vitae vehicula urna elementum et Ut placerat, erat et varius aliquet, purus sem viverra lorem, nec molestie quam erat at nisl. 
            Donec gravida quam sodales, lacinia elit ac, auctor nisi. Aliquam porttitor justo lorem, at rutrum turpis pretium et. Praesent in ornare tortor, eget euismod elit. 
            Suspendisse vitae tempus lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        </p>
        <section>
            <ul>
                <li><a href="?action=motivation_refuse">REFUSE</a></li
                <li><a href="?action=motivation_wait">WAIT</a></li>
                <li><a href="?action=motivation_accpet">ACCEPT</a></li>
            </ul>
        </section>
    </article>

    <article>
        <h1>Jean-Marie Le Pet</h1>
        <p>
            Nam auctor pellentesque diam, vitae vehicula urna elementum et Ut placerat, erat et varius aliquet, purus sem viverra lorem, nec molestie quam erat at nisl. 
            Donec gravida quam sodales, lacinia elit ac, auctor nisi. Aliquam porttitor justo lorem, at rutrum turpis pretium et. Praesent in ornare tortor, eget euismod elit. 
            Suspendisse vitae tempus lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        </p>
        <section>
            <ul>
                <li><a href="?action=motivation_refuse">REFUSE</a></li
                <li><a href="?action=motivation_wait">WAIT</a></li>
                <li><a href="?action=motivation_accpet">ACCEPT</a></li>
            </ul>
        </section>
    </article>

    <article>
        <h1>Henri Sale Vador</h1>
        <p>
            Nam auctor pellentesque diam, vitae vehicula urna elementum et Ut placerat, erat et varius aliquet, purus sem viverra lorem, nec molestie quam erat at nisl. 
            Donec gravida quam sodales, lacinia elit ac, auctor nisi. Aliquam porttitor justo lorem, at rutrum turpis pretium et. Praesent in ornare tortor, eget euismod elit. 
            Suspendisse vitae tempus lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        </p>
        <section>
            <ul>
                <li><a href="?action=motivation_refuse">REFUSE</a></li
                <li><a href="?action=motivation_wait">WAIT</a></li>
                <li><a href="?action=motivation_accpet">ACCEPT</a></li>
            </ul>
        </section>
    </article>
</section>