<article class="gestion_speaker_infos">

    <section class="gestion_speaker_infos_button">

        <form id="location" method="post" action="">
            <p>
                <input type="hidden" name="save" value="Save" />
                <input type="submit" name="submit_save" value="Save" />
            </p>
        </form>
    </section>

    <section class="gestion_speaker_infos">
        <form id="gestion_sepaker_infos" method="post" action="">
            <!--name-->
            <p>
                <label for="speaker_name">Firstname </label>
                <input type="text" name="speaker_name" value="Firstname" style="width:200px" />
            </p>

            <p>
                <label for="speaker_surname">Surname </label>
                <input type="text" name="speaker_surname" value="Surname" style="width:200px" />
            </p>

            <!--email-->
            <p>
                <label for="speaker_email">Email </label>
                <input type="email" name="speaker_email" value="Email" style="width:200px" />
            </p>

            <!--Date-->
            <p>
                <label for="speaker_dateofbirth">Date of birth </label>
                <input type="date" name="speaker_dateofbirth" value="Date of birth" style="width:200px" />
            </p>

            <!--phoneNumber-->
            <p>
                <label for="speaker_phoneNumber">Phone number </label>
                <input type="number" name="speaker_phoneNumber" value="Phone number" style="width:200px" />
            </p>

            <!--adress-->
            <p>
                <label for="speaker_street">Street </label>
                <input type="text" name="speaker_street" value="Street" style="width:200px" />

                <label for="speaker_street_number">No </label>
                <input type="number" name="speaker_street_number" value="no" style="width:200px" />
            </p>

            <p>
                <label for="speaker_NPA">NPA </label>
                <input type="number" name="speaker_NPA" value="NPA" style="width:200px" />

                <label for="speaker_city">City</label>
                <input type="number" name="speaker_city" value="City" style="width:200px" />
            </p>

            <p>
                <label for="speaker_country">Country</label>
                <input type="text" name="speaker_country" value="Country" style="width:200px" />
            </p>
        </form>       
    </section>
</article>
<!--end of gestion_speaker_infos-->