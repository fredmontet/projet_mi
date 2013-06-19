<article class="event_single">

    <!--event header-->

    <header>
        <h1 class="event_date">14 April 2013</h1>
        <h1 class="event_title">Title of Event</h1>

        <nav class="event_nav">
            <a href="#user_infos">fred1</a>
            <a href="#deux">fred2</a>
            <a href="#trois">fred3</a>   
            <a href="#quatre">fred4</a>
            <p>fred fait le nav</>
        </nav>
    </header>

    <!--user-informations tab-->
    <section class="user_infos">

        <!--user_infos-->
        <section class="event_user_infos">
            <h2 class="event_user_infos_title">Your general informations</h2>

                <!--formulaire-->
                <form id="user_infos" method="post" action="xx.php">

                    <!--user_name-->
                    <p>
                        <input type="text" name="user_name" value="Your name"style="width:200px" />
                    </p>

                    <!--user_surname-->
                    <p>
                        <input type="text" name="user_surname" value="Your surname" style="width:200px"/>
                    </p>

                    <!--user_email-->
                    <p>
                        <input type="email" name="user_email" value="Your email" style="width:200px" />
                    </p>

                    <p>
                        <input type="email" name="user_email" value="Repeat your email" style="width:200px" />
                    </p>

                    <!--user_pw-->
                    <p>
                        <input type="text" name="user_subject" value="Your password" style="width:200px" />
                    </p>

                    <p>
                        <input type="text" name="user_subject" value="Repeat your password" style="width:200px" />
                    </p>
                </form>
                <!--end formulaire-->
        </section>
        <!--end user_infos-->

    </section>
    <!--end user_infos tab-->
    <!--go ahead button-->
    <button type="button" onclick="alert("Hello world!")">ICI BOUTON MANQUE</button>
    <!--end button-->

</article>