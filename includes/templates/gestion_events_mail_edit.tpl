<form class="gestion_events_mail_edit" method="post" action="">
    <!--adress mail-->
    <fieldset>
        <p>
            <label for="to">To</label>
            <select>
                <option>participant e_mail</option>
            </select>
        </p>
        <!--send email button-->
        <form name="send" method="post" action="mail_send">
            <input type="hidden" name="action" value="Send">
            <input type="submit" name="submit_send" value="Send">
        </form>
        <p>
            <label for="subject">Subject</label>
            <input type=text name="subject" value="subject" />
        </p>
        <p>
            <textarea rows="15" cols="70">Hi ! You have been refused. Best Regards TEDx Lausanne</textarea>
        </p>
    </fieldset>
</form>

