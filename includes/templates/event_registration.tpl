<article class="event_single">

    <!--event header-->

    <header>
        <h1 class="event_date">14 April 2013</h1>
        <h1 class="event_title">Title of Event</h1>

        <nav class="event_nav">
            <a href="#user_infos">fred1</a>
            <a href="#user_details">fred2</a>
            <a href="#user_adress">fred3</a>   
            <a href="#user_motivation">fred4</a>
            <p>fred fait le nav</>
        </nav>
    </header>

    <!--user-informations tab-->
    <section class="event_user_infos">
        <h2 class="event_user_infos_title">Your general informations</h2>

        <!--formulaire-->
        <form id="user_infos" method="post" action="xx.php">

            <!--user_name-->
            <p>
                <label for="user_name">Name </label>
                <input type="text" name="user_name" style="width:200px" />
            </p>

            <!--user_surname-->
            <p>
                <label for="user_surname">Surame </label>
                <input type="text" name="user_surname" style="width:200px"/>
            </p>

            <!--user_email-->
            <p>
                <label for="user_email">Email </label>
                <input type="email" name="user_email" style="width:200px" />
            </p>

            <p>
                <label for="user_email">Repeat email </label>
                <input type="email" name="user_email" style="width:200px" />
            </p>

            <!--user_pw-->
            <p>
                <label for="user_password">Password </label>
                <input type="text" name="user_password" style="width:200px" />
            </p>

            <p>
                <label for="user_password">Repeat password </label>
                <input type="text" name="user_password" style="width:200px" />
            </p>
        </form>
        <!--end formulaire-->
        <!--go ahead button-->
            <a href="user_details" class="event_user_infos">mettre lien bouton</a>
        <!--end button-->
    </section>
    <!--end user_infos tab-->

    <!--user-details tab-->
    <section class="event_user_details">
        <h2 class="event_user_details_title">And a bit more details...</h2>

        <!--formulaire-->
        <form id="user_details" method="post" action="xx.php">

            <!--user_dateofbirth-->
            <p>
                <label for="user_dateofbirth">Date of birth </label>
                <input type="date" name="user_dateofbirth" style="width:200px" />
            </p>

            <!--user_phone-->
            <p>
                <label for="user_phoneNumebr">Phone number </label>
                <input type="tel" name="user_phoneNumber" style="width:200px"/>
            </p>

            <!--message-->
            <p>
                <label for="user_message">Message </label>
                <textarea type="text" name="user_message" rows="4" cols="26">Your message</textarea>
            </p>
        </form>
        <!--end formulaire-->
        <!--go ahead button-->
            <a href="user_adress" class="event_user_details">mettre lien bouton</a>
        <!--end button-->
    </section>
    <!--end user_details tab-->

    <!--user_adress tab-->
    <section class="event_user_adress">
        <h2 class="event_user_adress_title">Please give us your adress</h2>

        <!--formulaire-->
        <form id="user_adress" method="post" action="xx.php">

            <!--user_street-->
            <p>
                <label for="user_street">Street </label> 
                <input type="text" name="user_street" style="width:200px" />
                <label for="user_streetNumber">Number </label>
                <input type="number" name="user_streetNumber" style="width:200px" />
            </p>

            <!--user_city-->
            <p>
                <label for="user_cityNPA">NPA </label>
                <input type="number" name="user_cityNPA" style="width:200px" />
                <label for="user_city">City </label>
                <input type="number" name="user_city" style="width:200px" />
            </p>
            
            <!--user_country-->
            <p>
                <label for="user_country">Country </label>
                <input type="text" name="user_country" style="width:200px" />
        </form>
        <!--end formulaire-->
        <!--go ahead button-->
            <a href="user_motivation" class="event_user_adress">mettre lien bouton</a>
        <!--end button-->
    </section>
    <!--end user_adress tab-->

    <!--user_motivation tab-->
    <section class="event_user_motivation">
        <h2 class="event_user_motivation_title">Show us your motivations!</h2>

        <!--formulaire-->
        <form id="user_motivation" method="post" action="xx.php">

            <!--user_keywords-->
            <p>
                <label for="user_kw">Keyword 1 </label>
                <input type="text" name="user_kw"style="width:200px" />
            </p>
            <p>
                <label for="user_kw">Keyword 2 </label>
                <input type="text" name="user_kw" style="width:200px" />
            </p>
            <p>
                <label for="user_kw">Keyword 3 </label>
                <input type="text" name="user_kw" style="width:200px" />
            </p>

            <!--user_motivation-->
            <p>
                <label for="user_motivation">Keyword 1 </label>
                <textarea type="text" name="user_motivation" rows="4" cols="26">Your motivation</textarea>
            </p>
        </form>
        <!--end formulaire-->
        <!--participation button-->
        <button class="event_registration_button" type="button" onclick="alert("Hello world!")">Participate</button>
        <!end of button-->
    </section>
    <!--end user_motivation tab-->

</article>
<!--end of event_registration-->