{*
Smarty variables available:
$registrations (Array [Registrations] => Array
(	
[Registration] => Registration Object
[Person] => Person Object
)
) [0..1]
*}
<div span="6">
    <form class="gestion_events_mail_edit" method="post" action="">
        <!--adress mail-->
        <fieldset class="to">
            <legend for="to">To</legend>
            <select>
                <option>participant e_mail</option>
            </select>
        </fieldset>

        <!--send email button-->
        <input type="hidden" name="action" value="mail_send" />
        <input type="submit" name="submit_send" value="Send" />

        <fieldset class="subject">
            <legend>Subject</legend>
            <textarea>Hi ! You have been refused. Best Regards TEDx Lausanne</textarea>
        </fieldset>
    </form>
</div>