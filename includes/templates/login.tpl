<article class="login">
    <!--login tab-->
    <section class="offset3 span6">
        <h1>Connexion</h1>
        <!--login form-->
        <form name="login" method="post" action="">
            <fieldset>
             
                <label for="user_email">Email</label>
                <input type="email" name="user_email"></input>
                
                <label for="user_password">Password</label>
                <input type="text" name="user_password"></input>
        
            <!--login button-->
            <p>
                <input type="hidden" name="action" value="login_send"/>
                <input type="submit" name="login_send" value="Login"/>
            <!--CSS register button-->
           </p>    
                <a class="theButton" href="?action=register">Register</a>
            </fieldset>
        </form>

    </section>
</article>