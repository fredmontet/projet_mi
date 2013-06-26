<article class="contact span12">
    <section class="span6">
        <h1>Contact</h1>

        <!--form of contact-->
    <form name="contact" method="post" action="">
        <fieldset>
            <label>Name </label><input type="text" name="name">
            <label>Surname </label><input type="text" name="surname">
            <label>Email </label><input type="email" name="email">
            <label>Object </label><input type="text" name="subject">
            <label id="message">Message</label>
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
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=46.519931,6.565885&amp;ie=UTF8&amp;t=m&amp;z=14&amp;ll=46.519931,6.565885&amp;output=embed"></iframe>
        <br />
        <small>
               <a href="https://maps.google.com/maps?q=46.519931,6.565885&amp;ie=UTF8&amp;t=m&amp;z=14&amp;ll=46.519931,6.565885&amp;source=embed">Agrandir le plan</a>
        </small>
        <br/>
    </section>

</article>