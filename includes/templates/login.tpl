<article class="login">
    <!--login tab-->
    <section class="offset3 span6">
        <h1>Connexion</h1>
        <!--login form-->
        <form name="login" method="post" action="">
            <fieldset>
             
                <legend for="user_email">Email</legend>
                <input type="email" name="user_email"></input>
                
                <legend for="user_password">Password</legend>
                <input type="text" name="user_password"></input>
        
            <!--login button-->

                <input type="hidden" name="action" value="login_send"/>
                <input type="submit" name="login_send" value="Login"/>

        </form>
        <!--CSS register button-->
        <a class="theButton" href="?action=register">Register</a>
    </section>
</article>