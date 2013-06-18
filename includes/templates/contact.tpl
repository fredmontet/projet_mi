    </nav>
</header>
<section id="content">
    <article>
	<h1>Contact</h1>
            <form id="contact" method="post" action="xx.php">
    
            <!--name-->
            <p>
                <!--<label for="name">Name </label>-->
                <input type="text" name="user_name" value="Your name"style="width:200px" />
            </p>

            <p>
                <!--<label for="surname">Surname </label>-->
                <input type="text" name="user_surname" value="Your surname" style="width:200px"/>
            </p>

            <!--email-->
            <p>
                <!--<label for="email">Email </label>-->
                <input type="email" name="user_email" value="Your email" style="width:200px" />
            </p>

            <!--subject-->
            <p>
                <!--<label for="object">Object </label>-->
                <input type="text" name="user_subject" value="Your subject" style="width:200px" />
            </p>

            <!--message-->
            <p>
                <!--<label for="message">Message </label>-->
                <textarea type="text" name="user_message" rows="4" cols="26">Your message</textarea>
            </p>

            <!--submit--> 
            <p>
            <input type="submit" name="send" value="Send" />
            </p>
            
           </form>
    </article>
</section>