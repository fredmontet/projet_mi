<article class="login">
    <!--login tab-->
    <section>
        <h1>Connexion</h1>
        <!--login form-->
        <form name="login" method="post" action="">
            <p>
                <label for="user_email">Email</label>
                <input type="email" name="user_email"></input>
            </p>
            <p>
                <label for="user_password">Password</label>
                <input type="text" name="user_password"></input>
            </p>           
            <!--login button-->
            <p>
                <input type="hidden" name="action" value="login_send"/>
                <input type="submit" name="login_send" value="Login"/>
            </p>
        </form>
        <!--CSS register button-->
        <a href="?action=register">Register</a>
    </section>
</article>