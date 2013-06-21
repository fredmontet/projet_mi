<!--user-informations tab-->
<article class="register">
    <h1>Register</h1>

    <!--formulaire-->
    <form name="register" method="post" action="">

        <!--user_name-->
        <p>
            <input type="text" name="user_name" value="First name"/>
        </p>

        <!--user_surname-->
        <p>
            <input type="text" name="user_surname" value="Surname"/>
        </p>

        <!--user_email-->
        <p>
            <input type="email" name="user_email" value="Email"/>
        </p>

        <p>
            <input type="email" name="user_email" value="Repeat email"/>
        </p>

        <!--user_pw-->
        <p>
            <input type="text" name="user_password" value="Password"/>
        </p>

        <p>
            <input type="text" name="user_password" value="Repeat password"/>
        </p>
        <p>
            <input type="hidden" name="action" value="register_send"/>
            <input type="submit" name="register_send" value="Register"/>
        </p>       
    </form>
    <!--end formulaire-->

</article>