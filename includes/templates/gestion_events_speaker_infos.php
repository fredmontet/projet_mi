<fieldset class="gestion_events_speaker_infos">
    <p><input type="text" name="kw" value="keyword 1" /></p>
    <p><input type="text" name="kw" value="keyword 2" /></p>
    <p><input type="text" name="kw" value="keyword 3" /></p>
    <p><textarea>Description</textarea></p>

    <!--talk link-->
    <p><label for="talk">Talk's video</label></p>
    <p><input type="text" name="talk" value="http://" /><a href="http://youtube.com" /></p>

    <!--button-->
    <form name="send" method="post" action="?action=add_speaker_to_slot">
        <input type="hidden" name="action" value="Save" />
        <input type="submit" name="submit_save" value="Save" />
    </form>

</fieldset>