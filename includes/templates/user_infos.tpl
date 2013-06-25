<!--all user informations-->
<article class="user_infos span12">
    <!--modification informations form-->
    <section class="span6">
        <form name="user_infos" method="post" action="">
            <!--save modification button-->
            <p>
                <input type="hidden" name="action" value="user_infos_send" />
                <input class="buttonSaveModif" type="submit" name="user_infos_send" value="Save Modification" />
            </p>
            <!--firstname-->
            <p>
                <label for="user_name">First name</label>
                <input type="text" name="firstName" value="Firstname"/>
                <p class="errorvalue">Please enter a first name</p>
            </p>
            <!--surname-->
            <p>
                <label for="user_surname">Name</label>
                <input type="text" name="name" value="Surname"/>
                <p class="errorvalue">Please enter a name</p>
            </p>
            <!--email-->
            <p>
                <label for="user_email">Email</label>
                <input type="email" name="email" value="Email"/>
                <p class="errorvalue">Please enter an email</p>
            </p>
            <!--date-->
            <p>
                <label for="user_dateofbirth">Date of birth</label>
                <input type="date" name="dateofbirth" value="Date of birth"/>
                <p class="errorvalue">Please enter a date of birth</p>
            </p>
            <!--phoneNumber-->
            <p>
                <label for="user_phoneNumber">Phone number</label>
                <input type="text" name="phoneNumber" value="Phone number"/>
                <p class="errorvalue">Please enter a phone number</p>
            </p>
            <!--address-->
            <p>
                <label for="user_address">Address</label>
                <input type="text" name="address" value="Address"/>
                <p class="errorvalue">Please enter an address</p>
            </p>
            <!--City&npa-->
            <p>
                <label for="user_city">City</label>
                <input type="text" name="city" value="City"/>
                <p class="errorvalue">Please enter a city</p>
            </p>
            <!--country-->
            <p>
                <label for="user_country">Country</label>
                <input type="text" name="country" value="Country"/>
                <p class="errorvalue">Please enter a country</p>
            </p>
            <!--description-->
            <p>
                <label for="user_description">Description</label>
                <p class="errorvalue">Please enter a description</p>
                <textarea type="text" name="description" value="Description" rows="4" cols="26"></textarea>
            </p>
            
        </form>  
    </section>
    <!--end modification informations form-->
    
    <!--new password form-->
    <section class="span6">
        <form name="user_password" method="post" action="">
            <!--save new password button-->
            <p>
                <input type="hidden" name="action" value="user_infos_password" />
                <input class="buttonSavePwd" type="submit" name="user_infos_password" value="Save New Password" />
            </p>
            <!--firstname-->
            <p>
                <label for="current_password">Current Password</label>
                <input type="text" name="password" value="current_password"/>
                <p class="errorvalue">Please enter your current password</p>
            </p>
            <!--surname-->
            <p>
                <label for="new_password">New Password</label>
                <input type="text" name="password" value="new_password"/>
                <p class="errorvalue">Please enter a password</p>
            </p>
            <!--email-->
            <p>
                <label for="repeat_new_password">Repeat New Password</label>
                <input type="text" name="password" value="repeat_new_password"/>
                <p class="errorvalue">Please enter a password</p>
            </p>
            
        </form>  
    </section>
    <!--end new password form-->
</article>