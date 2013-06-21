<!--user-informations tab-->
<article class="register">
    <h1>Register</h1>

    <!--formulaire-->
    <form name="register" method="post" action="">

        <!--user_name-->
        <p>
            <label for="user_name">First name</label>
            <input type="text" name="user_name" value="First name"/>
        </p>

        <!--user_surname-->
        <p>
            <label for="user_surname">Surname</label>
            <input type="text" name="user_surname" value="Surname"/>
        </p>

        <!--user_email-->
        <p>
            <label for="user_email">Email</label>
            <input type="email" name="user_email" value="Email"/>
        </p>
        <!--user_repeat_email-->
        <p>
            <label for="user_repeat_email">Repeat email</label>
            <input type="email" name="user_repeat_email" value="Repeat email"/>
        </p>

        <!--user_pwd-->
        <p>
            <label for="user_password">Password</label>
            <input type="text" name="user_password" value="Password"/>
        </p>
        <!--user_repeat_pwd-->
        <p>
            <label for="user_repeat_password">Repeat password</label>
            <input type="text" name="user_repeat_password" value="Repeat password"/>
        </p>
        <p>
            <input type="hidden" name="action" value="register_send"/>
            <input type="submit" name="register_send" value="Register"/>
        </p>       
    </form>
    <!--end formulaire-->
</article>