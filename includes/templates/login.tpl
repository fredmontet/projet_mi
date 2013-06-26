{*
Smarty variables available:
	$errorState (Array of status about uncorrect values)
	$errorFormMessage (Array of error Formular message)
*}

<article class="login">
    <!--login tab-->
    <section class="offset3 span6">
        <h1>Connexion</h1>
        <!--login form-->
        <form name="login" method="post" action="">
            <fieldset>
             
                <label for="email">Email</label>
                <input type="text" name="email" value=""></input>
                {if $errorState != null && !$errorState.email}<p class="errorvalue">{$errorFormMessage.email}</p>{/if}
                
                <label for="password">Password</label>
                <input type="password" name="password" value=""></input>
                {if $errorState != null && !$errorState.password}<p class="errorvalue">{$errorFormMessage.login_password}</p>{/if}
        
            <!--login button-->
            <p>
                <input type="hidden" name="action" value="login"/>
                <input type="submit" name="update" value="Login"/>
            <!--CSS register button-->
           </p>    
                <a class="theButton" href="?action=register">Register</a>
            </fieldset>
        </form>

    </section>
</article>