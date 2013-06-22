<!--user-informations tab-->
<article class="register offset3 span6">
    <h1>Register</h1>

    <!--formulaire-->
    <form name="register" method="post" action="">

        <!--user_name-->
        <p>
            <label for="user_name">First name</label>
            <input type="text" name="user_name"/>
        </p>

        <!--user_surname-->
        <p>
            <label for="user_surname">Surname</label>
            <input type="text" name="user_surname"/>
        </p>

        <!--user_email-->
        <p>
            <label for="user_email">Email</label>
            <input type="email" name="user_email"/>
        </p>
        <!--user_repeat_email-->
        <p>
            <label for="user_repeat_email">Repeat email</label>
            <input type="email" name="user_repeat_email"/>
        </p>

        <!--user_pwd-->
        <p>
            <label for="user_password">Password</label>
            <input type="text" name="user_password"/>
        </p>
        <!--user_repeat_pwd-->
        <p>
            <label for="user_repeat_password">Repeat password</label>
            <input type="text" name="user_repeat_password"/>
        </p>
        <p>
            <input type="hidden" name="action"/>
            <input type="submit" name="register_send"/>
        </p>       
    </form>
    <!--end formulaire-->
</article>