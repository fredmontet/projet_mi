<form class="gestion_events_speaker_infos" method="post" action="">
    <fieldset>
        <input type="text" name="kw" value="keyword 1" />
        <input type="text" name="kw" value="keyword 2" />
        <input type="text" name="kw" value="keyword 3" />
    </fieldset>
    <fieldset>
        <textarea>Description</textarea>
    </fieldset>

    <!--talk link-->
    <fieldset>
            <legend>Talk's video</legend>
            <input type="text" name="talk" value="http://youtu.be/hihknkjgkm" />
    </fieldset>

    <!--button-->
    <input type="hidden" name="action" value="gestion_speaker_infos_send" />
    <input type="submit" name="submit_save" value="Save" />
</form>