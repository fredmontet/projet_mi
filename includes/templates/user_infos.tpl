<article class="user_infos">

    <section class="user_infos_button">

        <form id="user_info" method="post" action="">
            <p>
                <input type="hidden" name="save" value="Save modification" />
                <input type="submit" name="submit_save" value="Save modification" />
            </p>
        </form>
    </section>

    <section class="user_infos_form">
        <form id="user_infos" method="post" action="">
            <!--name-->
            <p>
                <label for="user_name">Firstname </label>
                <input type="text" name="user_name" value="Firstname" style="width:200px" />
            </p>

            <p>
                <label for="user_surname">Surname </label>
                <input type="text" name="user_surname" value="Surname" style="width:200px" />
            </p>

            <!--email-->
            <p>
                <label for="user_email">Email </label>
                <input type="email" name="user_email" value="Email" style="width:200px" />
            </p>

            <!--Date-->
            <p>
                <label for="user_dateofbirth">Date of birth </label>
                <input type="date" name="user_dateofbirth" value="Date of birth" style="width:200px" />
            </p>

            <!--phoneNumber-->
            <p>
                <label for="user_phoneNumber">Phone number </label>
                <input type="number" name="user_phoneNumber" value="Phone number" style="width:200px" />
            </p>

            <!--adress-->
            <p>
                <label for="user_street">Street </label>
                <input type="text" name="user_street" value="Street" style="width:200px" />

                <label for="user_street_number">No </label>
                <input type="number" name="user_street_number" value="no" style="width:200px" />
            </p>

            <p>
                <label for="user_NPA">NPA </label>
                <input type="number" name="user_NPA" value="NPA" style="width:200px" />

                <label for="user_city">City</label>
                <input type="number" name="user_city" value="City" style="width:200px" />
            </p>

            <p>
                <label for="user_country">Country</label>
                <input type="text" name="user_country" value="Country" style="width:200px" />
            </p>

            <!--description-->
            <p>
                <label for="user_description">Description </label>
                <textarea type="text" name="user_description" value="Description" rows="4" cols="26"></textarea>
            </p>
        </form>       
    </section>
</article>