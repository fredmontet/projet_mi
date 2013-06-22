{*
Smarty variables available:
	$person (Object)
	$registrations (Array [Registrations] => Array
		(	
			[Registration] => Registration Object
			[Event] => Event Object
		)
	) [0..1]
	$roles (Array of Object) [0..1]
*}

<article class="gestion_contacts_infos">

        
       <form id="contact" method="post" action="">
           <fieldset> 
        <!--save--> 
        <p>
            <input type="hidden" name="action" value="gestion_contacts_send" />
            <input type="submit" name="gestion_contacts_send" value="Save" />
        </p>
        <!--first name-->
        <p>
            <label for="name">First name </label>
            <input type="text" name="user_name" value="{$person->getFirstname()}"/>
        </p>
        <!--surname-->
        <p>
            <label for="surname">Surname </label>
            <input type="text" name="user_surname" value="{$person->getName()}"/>
        </p>

        <!--date of birth-->
        <p>
            <label for="dateOfBirth">Date of birth (dd/mm/yyyy) </label>
            <input type="date" name="user_dateOfBirth" value="{$person->getDateOfBirth()}"/>
        </p>

        <!--phone number-->
        <p>
            <label for="phoneNumber">Phone number </label>
            <input type="text" name="user_phoneNumber" value="{$person->getPhoneNumber()}"/>
        </p>
        <!--address-->
        <p>
            <label for="address">Address </label>
            <input type="text" name="user_address" value="{$person->getAddress()}"/>
        </p>
        <!--city-->
        <p>
            <label for="city">City</label>
            <input type="text" name="user_city" value="{$person->getCity()}"/>
        </p>
        <!--country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="user_country" value="{$person->getCountry()}"/>
        </p>

        <!--description-->
        <p>

            <label for="description">Description </label>
            <textarea type="text" name="user_description" rows="4" cols="26">{$person->getDescription()}</textarea>
        </p>
        </fieldset>
        <table> <caption>Event's participation</caption>
        	{foreach from=$registrations item=registration}
            	<tr>{$registration.event->getMainTopic()}</tr>
            {/foreach}
        </table>
           
        <table> <caption>Event's talk</caption>
            	<tr>Title of event</tr>
        </table>
        
        <table> <caption>Event's organization</caption>
        	{foreach from=$roles item=role}
            	<tr>{$role->getEventNo()}</tr>
            {/foreach}
        </table>
 
        <fieldset>
                <legend>Role in TEDx</legend>   
        <p>
            <select name="teamRoleAffect" size="1">
                <option>Chose the role</option>
                <option>Directeur</option>
                <option>Sous-directeur</option>
                <option>...</option>
            </select>  
        </p>
        </fieldset>
        </form>
</article>