    <!--user-informations tab-->
    <article class="register">
        <h1>Register</h1>

        <!--formulaire-->
        <form method="post" action="?action=home">

            <!--user_name-->
            <p>
                <input type="text" name="user_name" value="First name" style="width:200px" />
            </p>

            <!--user_surname-->
            <p>
                <input type="text" name="user_surname" value="Surname" style="width:200px"/>
            </p>

            <!--user_email-->
            <p>
                <input type="email" name="user_email" value="Email" style="width:200px" />
            </p>

            <p>
                <input type="email" name="user_email" value="Repeat email" style="width:200px" />
            </p>

            <!--user_pw-->
            <p>
                <input type="text" name="user_password" value="Password" style="width:200px" />
            </p>

            <p>
                <input type="text" name="user_password" value="Repeat password" style="width:200px" />
            </p>
            
            <input type="submit" name="submit_register" value="Register" onclick="alert("Your are register!")></input>
                   
        </form>
        <!--end formulaire-->
        
    </article>