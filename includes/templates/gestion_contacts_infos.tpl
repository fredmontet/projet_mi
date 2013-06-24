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
		        <p>
		        	<input type="hidden" name="id" value="{$person->getNo()}" />
		            <input type="hidden" name="action" value="gestion_contacts_infos" />
		            <input type="submit" name="update" value="Save" />
		        </p>
		        <p>
		            <label for="firstname">First name </label>
		            <input type="text" name="firstname" value="{$person->getFirstname()}"/>
		            {if $errorState != null && !$errorState.firstname}<p class="errorvalue">{$errorFormMessage.firstname}</p>{/if}
		        </p>
		        <p>
		            <label for="name">Name </label>
		            <input type="text" name="name" value="{$person->getName()}"/>
		            {if $errorState != null && !$errorState.name}<p class="errorvalue">{$errorFormMessage.username}</p>{/if}
		        </p>
		        <p>
		            <label for="dateOfBirth">Date of birth (dd/mm/yyyy) </label>
		            <input type="date" name="dateOfBirth" value="{$person->getDateOfBirth()}"/>
		            {if $errorState != null && !$errorState.dateOfBirth}<p class="errorvalue">{$errorFormMessage.dateOfBirth}</p>{/if}
		        </p>
		        <p>
		            <label for="email">Email</label>
		            <input type="email" name="email" value="{$person->getEmail()}"/>
		            {if $errorState != null && !$errorState.email}<p class="errorvalue">{$errorFormMessage.email}</p>{/if}
		        </p> 
		        <p>
		            <label for="phoneNumber">Email</label>
		            <input type="text" name="phoneNumber" value="{$person->getPhoneNumber()}"/>
		            {if $errorState != null && !$errorState.phoneNumber}<p class="errorvalue">{$errorFormMessage.phoneNumber}</p>{/if}
		        </p>
		        <p>
		            <label for="address">Address </label>
		            <input type="text" name="address" value="{$person->getAddress()}"/>
		            {if $errorState != null && !$errorState.address}<p class="errorvalue">{$errorFormMessage.address}</p>{/if}
		        </p>
		        <p>
		            <label for="city">City</label>
		            <input type="text" name="city" value="{$person->getCity()}"/>
		            {if $errorState != null && !$errorState.city}<p class="errorvalue">{$errorFormMessage.city}</p>{/if}
		        </p>
		        <p>
		            <label for="country">Country</label>
		            <input type="text" name="country" value="{$person->getCountry()}"/>
		            {if $errorState != null && !$errorState.country}<p class="errorvalue">{$errorFormMessage.country}</p>{/if}
		        </p>
		        <p>
		
		            <label for="description">Description </label>
		            <textarea type="text" name="description" rows="4" cols="26">{$person->getDescription()}</textarea>
		        </p>
			</fieldset>
	        <table>
	        	<tr>
	        		<th>Event's participation</th>
	        	</tr>
	        	{foreach from=$registrations item=registration}
	        		<tr>
	        			<td>{*$if $registration.event != null}{$registration.event->getMainTopic()}{/if*}</td>
	        		</tr>
	            {/foreach}
	        </table>
	           
	        <table>
	        	<tr>
	        		<th>Event's talk</th>
	        	</tr>
	            <tr>
	            	<td>Title of event</td>
	            </tr>
	        </table>
	        
	        <table>
	        	<tr>
	        		<th>Event's organization</th>
	        	</tr>
	        	{if $roles != null}
		        	{foreach from=$roles item=role}
		            	<tr>
		            		<td>{$role->getName()}</td>
		            	</tr>
		            {/foreach}
				{/if}
	        </table>
	 
	        <fieldset>
	            <legend>Role in TEDx</legend>   
		        <p>
		            <select name="teamRoleAffect" size="1">
		            	{if $teamRoles != null}
			            	{foreach from=$teamRoles item=teamRole}
			            		<option selected value="{$teamRole->getName()}">{$teamRole->getName()}</option>
			            	{/foreach}
			            {/if}
		            </select>  
		        </p>
	        </fieldset>
        </form>
</article>