{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
	$errorFormMessage (Array of error Formular message)
	$errorState (Array of status about uncorrect values)
*}

<article class="gestion_contacts_new">
    <form id="contact" method="post" action="">
       <fieldset> 
	        <p>
	            <input type="hidden" name="action" value="gestion_contacts_new" />
	            <input type="submit" name="update" value="Save" />
	        </p>
	        <p>
	            <label for="firstname">First name </label>
	            <input type="text" name="firstname" value=""/>
	            {if $errorState != null && !$errorState.firstname}<p class="errorvalue">{$errorFormMessage.firstname}</p>{/if}
	        </p>
	        <p>
	            <label for="name">Name </label>
	            <input type="text" name="name" value=""/>
	            {if $errorState != null && !$errorState.name}<p class="errorvalue">{$errorFormMessage.username}</p>{/if}
	        </p>
	        <p>
	            <label for="dateOfBirth">Date of birth (dd/mm/yyyy) </label>
	            <input type="date" name="dateOfBirth" value=""/>
	            {if $errorState != null && !$errorState.dateOfBirth}<p class="errorvalue">{$errorFormMessage.dateOfBirth}</p>{/if}
	        </p>
	        <p>
	            <label for="email">Email</label>
	            <input type="email" name="email" value=""/>
	            {if $errorState != null && !$errorState.email}<p class="errorvalue">{$errorFormMessage.email}</p>{/if}
	        </p> 
	        <p>
	            <label for="phoneNumber">Phone number</label>
	            <input type="text" name="phoneNumber" value=""/>
	            {if $errorState != null && !$errorState.phoneNumber}<p class="errorvalue">{$errorFormMessage.phoneNumber}</p>{/if}
	        </p>
	        <p>
	            <label for="address">Address </label>
	            <input type="text" name="address" value=""/>
	            {if $errorState != null && !$errorState.address}<p class="errorvalue">{$errorFormMessage.address}</p>{/if}
	        </p>
	        <p>
	            <label for="city">City</label>
	            <input type="text" name="city" value=""/>
	            {if $errorState != null && !$errorState.city}<p class="errorvalue">{$errorFormMessage.city}</p>{/if}
	        </p>
	        <p>
	            <label for="country">Country</label>
	            <input type="text" name="country" value=""/>
	            {if $errorState != null && !$errorState.country}<p class="errorvalue">{$errorFormMessage.country}</p>{/if}
	        </p>
	        <p>
	
	            <label for="description">Description </label>
	            <textarea type="text" name="description" rows="4" cols="26"></textarea>
	        </p>
		</fieldset>
        <fieldset>
            <legend>Role in TEDx</legend>   
	        <p>
            	{foreach from=$teamRoles item=teamRole}
					<input type="checkbox" name="teamrole" value="{$teamRole->getName()}">{$teamRole->getName()}<br>
            	{/foreach}
	        </p>
        </fieldset>
    </form>
</article>