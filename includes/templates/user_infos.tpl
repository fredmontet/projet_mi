<article class="user_infos">
    <!--modification form-->
    <section>
        <form name="user_infos" method="post" action="">
            <!--firstname-->
            <p>
                <label for="user_name">First name</label>
                <input type="text" name="user_name" value="Firstname"/>
            </p>
            <!--surname-->
            <p>
                <label for="user_surname">Surname</label>
                <input type="text" name="user_surname" value="Surname"/>
            </p>
            <!--email-->
            <p>
                <label for="user_email">Email</label>
                <input type="email" name="user_email" value="Email"/>
            </p>
            <!--date-->
            <p>
                <label for="user_dateofbirth">Date of birth</label>
                <input type="date" name="user_dateofbirth" value="Date of birth"/>
            </p>
            <!--phoneNumber-->
            <p>
                <label for="user_phoneNumber">Phone number</label>
                <input type="number" name="user_phoneNumber" value="Phone number"/>
            </p>
            <!--address-->
            <p>
                <label for="user_street">Street</label>
                <input type="text" name="user_street" value="Street"/>

                <label for="user_street_number">No</label>
                <input type="number" name="user_street_number" value="no"/>
            </p>
            <!--City&npa-->
            <p>
                <label for="user_NPA">NPA</label>
                <input type="number" name="user_NPA" value="npa"/>

                <label for="user_city">City</label>
                <input type="number" name="user_city" value="city"/>
            </p>
            <!--country-->
            <p>
                <label for="user_country">Country</label>
                <input type="text" name="user_country" value="country"/>
            </p>
            <!--description-->
            <p>
                <label for="user_description">Description</label>
                <textarea type="text" name="user_description" value="description" rows="4" cols="26"></textarea>
            </p>
            <!--save modification button-->
            <p>
                <input type="hidden" name="action" value="user_infos_send" />
                <input type="submit" name="user_infos_send" value="Save Modification" />
            </p>
        </form>  
    </section>
    <!--end modification form-->
    
    <!--new password form-->
    <section>
        <form name="user_password" method="post" action="">
            <!--firstname-->
            <p>
                <label for="current_password">Current Password</label>
                <input type="text" name="current_password" value="current_password"/>
            </p>
            <!--surname-->
            <p>
                <label for="new_password">New Password</label>
                <input type="text" name="new_password" value="new_password"/>
            </p>
            <!--email-->
            <p>
                <label for="repeat_new_password">Repeat New Password</label>
                <input type="text" name="repeat_new_password" value="repeat_new_password"/>
            </p>
            <!--save new password button-->
            <p>
                <input type="hidden" name="action" value="user_infos_password" />
                <input type="submit" name="user_infos_password" value="Save New Password" />
            </p>
        </form>  
    </section>
    <!--end new password form-->
</article>