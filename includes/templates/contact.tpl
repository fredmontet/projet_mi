<article class="contact">
    <section class="span6">
        <h1>Contact</h1>

        <!--form of contact-->
    <form name="contact" method="post" action="">
        <fieldset>
            <legend>Name </legend>
            <input type="text" name="user_name"/>

            <legend>Surname </legend>
            <input type="text" name="user_surname"/>

            <legend>Email </legend>
            <input type="email" name="user_email"/>

            <legend>Object </legend>
            <input type="text" name="user_subject"/>

            <legend>Message </legend>
            <textarea></textarea>
        </fieldset>
        <!--button send-->
        <input type="hidden" name="action" value="contact_send">
        <input type="submit" name="contact_send" value="Send">
    </form>
    </section>
    <!--google map--> 
    <section class="span6">
        <h1>Find us</h1>
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=46.519931,6.565885&amp;num=1&amp;t=h&amp;ie=UTF8&amp;z=14&amp;ll=46.520197,6.566262&amp;output=embed"></iframe>
        <br/>
        <small>
            <a href="https://maps.google.com/maps?q=46.519931,6.565885&amp;num=1&amp;t=h&amp;ie=UTF8&amp;z=14&amp;ll=46.520197,6.566262&amp;source=embed" style="color:#0000FF;text-align:left">Agrandir le plan</a>
        </small>
    </section>

</article>