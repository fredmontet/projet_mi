<article class="login">
    <section>
        <h1 class="login_title">Connexion</h1>

        <!--formulaire-->
        <form method="post" action="?action=home">

            <p>
                <label for="user_email">Email </label>
                <input type="email" name="user_email"></input>
            </p>

            <p>
                <label for="user_password">Password </label>
                <input type="text" name="user_password"></input>
            </p>           

            <p>
                <input type="hidden" name="login" value="Login" />
                <input type="submit" name="submit_login" value="Login" onclick="alert("Your are logued!"/>
            </p>
        </form>
        
        <form method="post" action="?action=register">
            <p>
                <input type="hidden" name="register" value="Register" />
                <input type="submit" name="submit_register" value="Register" />
            </p>
        </form>

    </section>

</article>