<!--user-informations tab-->
<article class="register offset3 span6">
    <h1>Register</h1>

    <!--formulaire-->
    <form name="register" method="post" action="">

        <!--firstname-->
        <p>
            <label for="user_name">Firstname</label>
            <input type="text" name="firstname"/>
            <p class="errorvalue">Please enter a Firstname</p>
        </p>

        <!--name-->
        <p>
            <label for="name">Name</label>
            <input type="text" name="name"/>
            <p class="errorvalue">Please enter a Name</p>
        </p>
        
        <!--user_email-->
        <p>
            <label for="email">Email</label>
            <input type="email" name="email"/>
            <p class="errorvalue">Please enter a correct Email</p>
        </p>
        <!--user_repeat_email-->
        <p>
            <label for="email_repeat">Repeat email</label>
            <input type="email" name="email_repeat"/>
            <p class="errorvalue">Please enter a correct Email</p>
        </p>

        <!--user_pwd-->
        <p>
            <label for="user_password">Password</label>
            <input type="text" name="user_password"/>
            <p class="errorvalue">Please enter a correct Password</p>
        </p>
        <!--user_repeat_pwd-->
        <p>
            <label for="user_repeat_password">Repeat password</label>
            <input type="text" name="user_repeat_password"/>
            <p class="errorvalue">Please enter a correct Password</p>
        </p>
        
        <!--Date of Birth-->
        <p>
            <label for="dateOfBirth">Date of birth</label>
            <input type="date" name="dateOfBirth"/>
            <p class="errorvalue">Please enter a correct date of birth</p>
        </p>
        
        <!--Phone number-->
        <p>
            <label for="phoneNumber">Phone number</label>
            <input type="text" name="phoneNumber"/>
            <p class="errorvalue">Please enter a Phone number</p>
        </p>
        
        <!--Address-->
        <p>
            <label for="address">Address</label>
            <input type="text" name="address"/>
            <p class="errorvalue">Please enter an Address</p>
        </p>
        
        <!--City-->
        <p>
            <label for="city">City</label>
            <input type="text" name="city"/>
            <p class="errorvalue">Please enter a City</p>
        </p>
        
        <!--Country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="country"/>
            <p class="errorvalue">Please enter a Country</p>
        </p>

        <p>
            <input type="hidden" name="action" value="register"/>
            <input type="submit" name="update" value="Save"/>
        </p>       
    </form>
    <!--end formulaire-->
</article>