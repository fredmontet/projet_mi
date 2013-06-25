{*
Smarty variables available:
	$contacts (Array [Contacts] => Array
		(	
			[Person] => Person Object
			[Organizer] => Boolean
			[Speaker] => Boolean
			[Participant] => Boolean
		)
	) [0..1]
*}

<article class="gestion_contacts_list offset1 span10">
    <header class="gestion_subnav">
        <nav>
            <ul>
                <li><a href="#all">all</a></li>
                <li><a href="#teamTEDx">Team TEDx</a></li>
                <li><a href="#teamEvent">Team Event</a></li>
                <li><a href="#speakers">Speakers</a></li>
                <li><a href="#participants">Participants</a></li>
            </ul>
        </nav>
    </header>
   <table class="span12">
   		<tr>
	   		<th>Firstname</th>
	   		<th>Name</th>
                        <th colspan=3>Team Role of TEDx's members</th>
	   		
   		</tr>
		{foreach from=$contacts item=contact}
			<tr>
				<td><a href="?action=gestion_contacts_infos&id={$contact.person->getNo()}">{$contact.person->getFirstname()}</a></td>
				<td><a href="?action=gestion_contacts_infos&id={$contact.person->getNo()}">{$contact.person->getName()}</a></td>
				<td><a href="?action=gestion_contacts_infos&id={$contact.person->getNo()}">{if $contact.organizer}Organizer{/if}</a></td>
				<td><a href="?action=gestion_contacts_infos&id={$contact.person->getNo()}">{if $contact.speaker}Speaker{/if}</a></td>
				<td><a href="?action=gestion_contacts_infos&id={$contact.person->getNo()}">{if $contact.participant}Participant{/if}</a></td>
			</tr>
		{/foreach}
	</table>
</article>