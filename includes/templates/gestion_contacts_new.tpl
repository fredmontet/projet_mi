<article class="gestion_contacts_new">
            <!--save--> 
        <p>
            <input type="submit" name="save" value="Save" />
        </p>
        
        <h1>Create new contact</h1>

        <form id="contact" method="post" action="xx.php">
        <!--first name-->
        <p>
            <label for="name">First name </label>
            <input type="text" name="user_name" style="width:200px" />
        </p>
        <!--surname-->
        <p>
            <label for="surname">Surname </label>
            <input type="text" name="user_surname" style="width:200px"/>
        </p>

        <!--date of birth-->
        <p>
            <label for="email">Date of birth (dd/mm/yyyy) </label>
            <input type="date" name="user_dateOfBirth" style="width:200px" />
        </p>

        <!--phone number-->
        <p>
            <label for="object">Phone number </label>
            <input type="text" name="user_phoneNumber" style="width:200px" />
        </p>
        <!--address-->
        <p>
            <label for="object">Address </label>
            <input type="text" name="user_address" style="width:200px" />
        </p>
        <!--city-->
        <p>
            <label for="object">City</label>
            <input type="text" name="user_city" style="width:200px" />
        </p>
        <!--country-->
        <p>
            <label for="object">Country</label>
            <input type="text" name="user_country" style="width:200px" />
        </p>

        <!--message-->
        <p>
            <label for="message">Description </label>
            <textarea type="text" name="user_description" rows="4" cols="26"></textarea>
        </p>
        
        <h1>Role in TEDx</h1>   

        <p>
            <select name="teamRoleAffect" size="1">
                <option>Chose the role
                <option>Directeur
                <option>Sous-directeur
                <option>...
            </select>  
        </p>
        </form>
</article>