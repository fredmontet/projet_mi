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
                    <option>Chose the role</option>
                    <option>Directeur</option>
                    <option>Sous-directeur</option>
                    <option>...
                </select>  
            </p>
        </fieldset>
        </form>
</article>