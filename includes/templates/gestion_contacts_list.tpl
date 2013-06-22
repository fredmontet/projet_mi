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

<article class="gestion_contacts_list">
    <header>
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
    <ul> 
        <li>
            <a href="?action=gestion_contacts_infos">
                <span>Prénom</span>
                <span>Nom</span>
                <span>Fonction</span>
            </a>
        </li>    
   </ul>
   <table>
   		<tr>
	   		<th>Firstname</th>
	   		<th>Name</th>
	   		<th>Organizer</th>
	   		<th>Speaker</th>
	   		<th>Participant</th>
   		</tr>
	   {foreach from=$contacts item=contact}
	   		<tr>
	   			<td>{$contact.person->getFirstname()}</td>
	   			<td>{$contact.person->getName()}</td>
	   			<td>{if $contact.organizer}Organizer{/if}</td>
	   			<td>{if $contact.speaker}Speaker{/if}</td>
	   			<td>{if $contact.participant}Participant{/if}</td>
	   		</tr>
	   {/foreach}
	</table>
</article>