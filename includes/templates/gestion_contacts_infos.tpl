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
            <input type="text" name="user_name"/>
        </p>
        <!--surname-->
        <p>
            <label for="surname">Surname </label>
            <input type="text" name="user_surname"/>
        </p>

        <!--date of birth-->
        <p>
            <label for="dateOfBirth">Date of birth (dd/mm/yyyy) </label>
            <input type="date" name="user_dateOfBirth"/>
        </p>

        <!--phone number-->
        <p>
            <label for="phoneNumber">Phone number </label>
            <input type="text" name="user_phoneNumber"/>
        </p>
        <!--address-->
        <p>
            <label for="address">Address </label>
            <input type="text" name="user_address"/>
        </p>
        <!--city-->
        <p>
            <label for="city">City</label>
            <input type="text" name="user_city"/>
        </p>
        <!--country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="user_country"/>
        </p>

        <!--description-->
        <p>

            <label for="description">Description </label>
            <textarea type="text" name="user_description" rows="4" cols="26"></textarea>
        </p>
        </fieldset>
        <TABLE BORDER="1"> <CAPTION> Event's participation</CAPTION> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
        </TABLE>
           
        <TABLE BORDER="1"> 
            <CAPTION> Event's talk</CAPTION> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
        </TABLE>
 
        <TABLE BORDER="1"> 
            <CAPTION> Event's organization </CAPTION> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
            <TD> Title of event </TD> 
        </TABLE>
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