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
	$teamRoles (Array of Object) [0..1]
	$errorState (Array of status about uncorrect values)
	$errorFormMessage (Array of error Formular message)
*}

<article class="gestion_contacts_infos">

        
       <form id="contact" method="post" action="">
           <fieldset> 
        <!--save--> 
        <p>
        	<input type="hidden" name="id" value="{$person->getNo()}" />
            <input type="hidden" name="action" value="gestion_contacts_infos" />
            <input type="submit" name="update" value="Save" />
        </p>
        <!--first name-->
        <p>
            <label for="firstname">First name </label>
            <input type="text" name="firstname" value="{$person->getFirstname()}"/>
            {if $errorState.firstname}<p class="errorvalue">{$errorFormMessage.firstname}</p>{/if}
        </p>
        <!--surname-->
        <p>
            <label for="name">Name </label>
            <input type="text" name="name" value="{$person->getName()}"/>
        </p>

        <!--date of birth-->
        <p>
            <label for="dateOfBirth">Date of birth (dd/mm/yyyy) </label>
            <input type="date" name="dateOfBirth" value="{$person->getDateOfBirth()}"/>
        </p>

        <!--phone number-->
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" value="{$person->getEmail()}"/>
        </p>
        
        <p>
            <label for="phoneNumber">Email</label>
            <input type="text" name="phoneNumber" value="{$person->getPhoneNumber()}"/>
        </p>
        
        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="{$person->getCountry()}"/>
        </p>
        
        <!--address-->
        <p>
            <label for="address">Address </label>
            <input type="text" name="address" value="{$person->getAddress()}"/>
        </p>
        <!--city-->
        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="{$person->getCity()}"/>
        </p>
        <!--country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="{$person->getCountry()}"/>
        </p>

        <!--description-->
        <p>

            <label for="description">Description </label>
            <textarea type="text" name="description" rows="4" cols="26">{$person->getDescription()}</textarea>
        </p>
        </fieldset>
        <table> <caption>Event's participation</caption>
        	{foreach from=$registrations item=registration}
        		
            	<tr>{*$if $registration.event != null}{$registration.event->getMainTopic()}{/if*}</tr>-->
            {/foreach}
        </table>
           
        <table> <caption>Event's talk</caption>
            	<tr>Title of event</tr>
        </table>
        
        <table> <caption>Event's organization</caption>
        	{foreach from=$roles item=role}
            	<tr>{$role->getName()}</tr>
            {/foreach}
        </table>
 
        <fieldset>
                <legend>Role in TEDx</legend>   
        <p>
            <select name="teamRoleAffect" size="1">
            	{foreach from=$teamRoles item=teamRole}
            		<option>{if $teamRole != null}{$teamRole->getName()}{/if}</option>
            	{/foreach}
            </select>  
        </p>
        </fieldset>
        </form>
</article>