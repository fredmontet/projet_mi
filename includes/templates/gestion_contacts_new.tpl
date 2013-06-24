{*
Smarty variables available:
	$teamRoles (Array of Object) [0..1]
*}

<article class="gestion_contacts_new">
    
        <form method="post" action="">
            <!--save--> 
            <p>
                <input type="hidden" name="action" value="new_contact_send" />
                <input type="submit" name="submit_send" value="Save" />
            </p>
            <fieldset>
                <legend>Create new contact</legend>
                <!--first name-->
                <p>
                    <label for="name">First name </label>
                    <input type="text" name="user_name"/>
                </p>
                <!--surname-->
                <p>
                    <label for="surname">Surname </label>
                    <input type="text" name="user_surname"/>
                </p>

                <!--date of birth-->
                <p>
                    <label for="email">Date of birth (dd/mm/yyyy) </label>
                    <input type="date" name="user_dateOfBirth"/>
                </p>

                <!--phone number-->
                <p>
                    <label for="object">Phone number </label>
                    <input type="text" name="user_phoneNumber"/>
                </p>
                <!--address-->
                <p>
                    <label for="object">Address </label>
                    <input type="text" name="user_address"/>
                </p>
                <!--city-->
                <p>
                    <label for="object">City</label>
                    <input type="text" name="user_city"/>
                </p>
                <!--country-->
                <p>
                    <label for="object">Country</label>
                    <input type="text" name="user_country"/>
                </p>

                <!--message-->
                <p>
                    <label for="message">Description </label>
                    <textarea type="text" name="user_description"></textarea>
                </p>
        </fieldset>
        
        <fieldset>
           <legend>Role in TEDx</legend>  
            <p>
                <select name="teamRoleAffect" size="1">
                	{foreach from=$teamRoles item=teamRole}
						<option>{$teamRole->getName()}</option>
                	{/foreach}
                </select>  
            </p>
        </fieldset>
        </form>
        
        
        
        
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
		            <label for="phoneNumber">Email</label>
		            <input type="text" name="phoneNumber" value=""/>
		            {if $errorState != null && !$errorState.phoneNumber}<p class="errorvalue">{$errorFormMessage.phoneNumber}</p>{/if}
		        </p>
		        <p>
		            <label for="address">Address </label>{$person->getAddress()}"/>
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