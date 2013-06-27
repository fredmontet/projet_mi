{*
Smarty variables available:
	$errorState (Array of status about uncorrect values)
	$errorFormMessage (Array of error Formular message)
	$person (Object)
*}


<!--all user informations-->
<article class="user_infos span12">
    <!--modification informations form-->
    <section class="span6">
        <form name="user_infos" method="post" action="">
            <!--save modification button-->
            <p>
                <input type="hidden" name="action" value="user_infos" />
                <input class="buttonSaveModif" type="submit" name="update" value="Save" />
            </p>
            <!--title-->
            <legend>Profil edition</legend>
            <!--firstname-->
            <p>
                <label for="firstname">First name</label>
                <input type="text" name="firstname" value="{$person->getFirstname()}"/>
                <p class="errorvalue">Please enter a first name</p>
            </p>
            <!--surname-->
            <p>
                <label for="name">Name</label>
                <input type="text" name="name" value="{$person->getName()}"/>
                <p class="errorvalue">Please enter a name</p>
            </p>
            <!--email-->
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" value="{$person->getEmail()}"/>
                <p class="errorvalue">Please enter an email</p>
            </p>
            <!--date-->
            <p>
                <label for="dateofbirth">Date of birth</label>
                <input type="date" name="dateOfBirth" value="{$person->getDateOfBirth()}"/>
                <p class="errorvalue">Please enter a date of birth</p>
            </p>
            <!--phoneNumber-->
            <p>
                <label for="phoneNumber">Phone number</label>
                <input type="text" name="phoneNumber" value="{$person->getPhoneNumber()}"/>
                <p class="errorvalue">Please enter a phone number</p>
            </p>
            <!--address-->
            <p>
                <label for="address">Address</label>
                <input type="text" name="address" value="{$person->getAddress()}"/>
                <p class="errorvalue">Please enter an address</p>
            </p>
            <!--City&npa-->
            <p>
                <label for="city">City</label>
                <input type="text" name="city" value="{$person->getCity()}"/>
                <p class="errorvalue">Please enter a city</p>
            </p>
            <!--country-->
            <p>
                <label for="country">Country</label>
                <input type="text" name="country" value="{$person->getCountry()}"/>
                <p class="errorvalue">Please enter a country</p>
            </p>
            <!--description-->
            <p>
                <label for="description">Description</label>
                <textarea type="text" name="description" value="{$person->getDescription()}"></textarea>
                <p class="errorvalue">Please enter a description</p>
            </p>
            
        </form>  
    </section>
    <!--end modification informations form-->
    
    <!--new password form-->
    <section class="span6">
        <form name="user_password" method="post" action="">
            <!--save new password button-->
            <p>
                <input type="hidden" name="action" value="infos_password" />
                <input class="buttonSavePwd" type="submit" name="button_password" value="Save" />
            </p>
            <!--title-->
            <legend>Password edition</legend>
            <!--firstname-->
            <p>
                <label for="current_password">Current Password</label>
                <input type="password" name="password" value="Current password"/>
                <p class="errorvalue">Please enter your current password</p>
            </p>
            <!--surname-->
            <p>
                <label for="new_password">New Password</label>
                <input type="password" name="password" value="New password"/>
                <p class="errorvalue">Please enter a password</p>
            </p>
            <!--email-->
            <p>
                <label for="repeat_new_password">Repeat New Password</label>
                <input type="password" name="password" value="Repeat new password"/>
                <p class="errorvalue">Please enter a password</p>
            </p>
            
        </form>  
    </section>
    <!--end new password form-->
</article>