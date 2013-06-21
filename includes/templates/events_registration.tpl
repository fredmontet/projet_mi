<article class="events_registration">

    <!--registration header-->
    <header>
        <h1>{$event->getStartingDate()|date_format:"%d %B %Y"}</h1>
        <h1>{$event->getMainTopic()}</h1>
        <nav>
            <a href="#event_user_infos">fred1</a>
            <a href="#event_user_details">fred2</a>
            <a href="#event_user_adress">fred3</a>   
            <a href="#event_user_motivation">fred4</a>
            <p>fred fait le nav</>
        </nav>
    </header>
    <!--end registration header-->


    <section>
    <!--form-->
        <form method="post" action="">
            
        <!--user_infos-->
            <fieldset id="event_user_infos">
                <legend>General informations</legend>
                <!--user_name-->
                <p>
                    <label for="user_name">First name</label>
                    <input type="text" name="user_name"/>
                </p>

                <!--user_surname-->
                <p>
                    <label for="user_surname">Surname</label>
                    <input type="text" name="user_surname"/>
                </p>

                <!--user_email-->
                <p>
                    <label for="user_email">Email </label>
                    <input type="email" name="user_email"/>
                </p>

                <p>
                    <label for="user_email">Repeat email </label>
                    <input type="email" name="user_email"/>
                </p>

                <!--user_pw-->
                <p>
                    <label for="user_password">Password </label>
                    <input type="text" name="user_password"/>
                </p>

                <p>
                    <label for="user_password">Repeat password </label>
                    <input type="text" name="user_password"/>
                </p>
            </fieldset>
        
            <!--go ahead button-->
                <a href="#event_user_details">next</a>
            <!--end button-->
        
        <!--user details-->
            <fieldset id="event_user_details">
            <legend>And a bit more details...</legend>
            
                <!--user_dateofbirth-->
                <p>
                    <label for="user_dateofbirth">Date of birth </label>
                    <input type="date" name="user_dateofbirth"/>
                </p>

                <!--user_phone-->
                <p>
                    <label for="user_phoneNumebr">Phone number </label>
                    <input type="tel" name="user_phoneNumber"/>
                </p>

                <!--message-->
                <p>
                    <label for="user_message">Message </label>
                    <textarea type="text" name="user_message"></textarea>
                </p>
            </fieldset>
        
            <!--go ahead button-->
                <a href="#event_user_adress">next</a>
            <!--end button-->
            
<!--user adress tab-->
            <fieldset id="event_user_adress">
            <legend>Please give us your adress</legend>
               <!--user_street-->
                <p>
                    <label for="user_street">Street </label> 
                    <input type="text" name="user_street"  />
                    <label for="user_streetNumber">Number </label>
                    <input type="number" name="user_streetNumber"/>
                </p>

                <!--user_city-->
                <p>
                    <label for="user_cityNPA">NPA </label>
                    <input type="number" name="user_cityNPA"/>
                    <label for="user_city">City </label>
                    <input type="number" name="user_city"/>
                </p>

                <!--user_country-->
                <p>
                    <label for="user_country">Country </label>
                    <input type="text" name="user_country"/>
            </fieldset>

                    
            <!--go ahead button-->
                <a href="#event_user_motivation">next</a>
            <!--end button-->

    <!--user_motivation tab-->
            <fieldset id="event_user_motivation">
            <legend>Show us your motivations!</legend>

                    <!--user_keywords-->
                    <p>
                        <label for="user_kw">Keyword 1 </label>
                        <input type="text" name="user_kw" />
                    </p>
                    <p>
                        <label for="user_kw">Keyword 2 </label>
                        <input type="text" name="user_kw"  />
                    </p>
                    <p>
                        <label for="user_kw">Keyword 3 </label>
                        <input type="text" name="user_kw"  />
                    </p>

                    <!--user_motivation-->
                    <p>
                        <label for="user_motivation">Motivation </label>
                        <textarea type="text" name="user_motivation" rows="4" cols="26"></textarea>
                    </p>
            </fieldset>
    
            <!--participation button-->
            <button type="button" onclick="alert("Hello world!")">Participate</button>
            <!--end of button-->
                
        </form>
  
    </section>
</article>