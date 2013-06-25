{*
Smarty variables available:
    $registrations (Array [Registrations] => Array
                (	
                    [Registration] => Registration Object
                    [Person] => Person Object
                )
    ) [0..1]

    $person (Object)
*}

<div class="span6">
    <form class="gestion_events_mail_edit" method="post" action="">

        <!--send email button-->
        <input type="hidden" name="action" value="mail_send" />
        <input type="submit" name="submit_send" value="Send" />

        <!--adress mail-->

        <fieldset>
            
            <input type="email" name"mail" value="{$person->getEmail()}">

            <label>Subject</label>
            <input type="text" name="subject" value="">

            <textarea name="message"></textarea>
        </fieldset>
    </form>
</div>