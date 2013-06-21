<article class="contact">
    
<!--form of contact-->
    <section>
        <h1>Contact</h1>
        <form name="contact" method="post" action="">

            <!--name-->
            <p>
                <label for="name">Name </label>
                <input type="text" name="user_name"/>
            </p>

            <p>
                <label for="surname">Surname </label>
                <input type="text" name="user_surname"/>
            </p>

            <!--email-->
            <p>
                <label for="email">Email </label>
                <input type="email" name="user_email"/>
            </p>

            <!--subject-->
            <p>
                <label for="object">Object </label>
                <input type="text" name="user_subject"/>
            </p>

            <!--message-->
            <p>
                <label for="message">Message </label>
                <textarea type="text" name="user_message" rows="4" cols="26"></textarea>
            </p>

            <!--submit--> 
            <p>
                <input type="hidden" name="action" value="contact_send">
                <input type="submit" name="contact_send" value="Send">
            </p>        
            </form>
    </section>

    <!--google map--> 
    <section>
        <h1>Find us</h1>
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=46.519931,6.565885&amp;num=1&amp;t=h&amp;ie=UTF8&amp;z=14&amp;ll=46.520197,6.566262&amp;output=embed"></iframe>
            <br />
        <small>
            <a href="https://maps.google.com/maps?q=46.519931,6.565885&amp;num=1&amp;t=h&amp;ie=UTF8&amp;z=14&amp;ll=46.520197,6.566262&amp;source=embed" style="color:#0000FF;text-align:left">Agrandir le plan</a>
        </small>
    </section>
    
</article>