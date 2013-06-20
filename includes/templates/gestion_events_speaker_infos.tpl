<fieldset class="gestion_events_speaker_infos">
    <p><input type="text" name="kw" value="keyword 1" /></p>
    <p><input type="text" name="kw" value="keyword 2" /></p>
    <p><input type="text" name="kw" value="keyword 3" /></p>
    <p><textarea>Description</textarea></p>

    <!--talk link-->
    <p>
        <a href="mettre lien sur video">
            <label for="talk">Talk's video</label>
            <input type="text" name="talk" value="http://">
        </a>

    </p>

    <!--button-->
    <form name="send" method="post" action="gestion_speaker_infos_send">
        <input type="hidden" name="action" value="Save" />
        <input type="submit" name="submit_save" value="Save" />
    </form>

</fieldset>