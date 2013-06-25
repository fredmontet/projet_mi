<article class="events_registration offset2 span8">

    <!--registration header-->
    <header class="span12">            
        <h1>{$event->getMainTopic()}</h1>
        <time>{$event->getStartingDate()|date_format:"%d %B %Y"}</time>
<!--
        <nav class="offset2 span8">
            <a href="#event_user_infos"><span>infos</span></a>
            <a href="#event_user_details"><span>details</span></a>
            <a href="#event_user_adress"><span>address</span></a>   
            <a href="#event_user_motivation"><span>motivation</span></a>
        </nav>
-->
    </header>
    <!--end registration header-->


    <section class="span12">
    <!--form-->
        <form method="post" action="">
            
        <!--user_infos-->
            <fieldset id="event_user_infos">
                <legend>General informations</legend>
                <!--user_name-->
                <p>
                    <label for="user_name">First name</label>
                    <input type="text" name="user_name"/>
                    <p class="errorvalue">Please enter a first name</p>
                    
                </p>

                <!--user_surname-->
                <p>
                    <label for="user_surname">Surname</label>
                    <input type="text" name="user_surname"/>
                    <p class="errorvalue">Please enter a surname</p>
                </p>

                <!--user_email-->
                <p>
                    <label for="user_email">Email </label>
                    <input type="email" name="user_email"/>
                    <p class="errorvalue">Please enter an email</p>
                </p>

                <p>
                    <label for="user_email">Repeat email </label>
                    <input type="email" name="user_email"/>
                    <p class="errorvalue">Please repeat the email</p>
                </p>

                <!--user_pw-->
                <p>
                    <label for="user_password">Password </label>
                    <input type="text" name="user_password"/>
                    <p class="errorvalue">Please enter a password</p>
                </p>

                <p>
                    <label for="user_password">Repeat password </label>
                    <input type="text" name="user_password"/>
                    <p class="errorvalue">Please repeat the password</p>
                </p>
            </fieldset>
        
            <!--go ahead button-->
            <!--    <a href="#event_user_details">next</a> -->
            <!--end button-->
        
        <!--user details-->
            <fieldset id="event_user_details">
            <legend>And a bit more details...</legend>
            
                <!--user_dateofbirth-->
                <p>
                    <label for="user_dateofbirth">Date of birth </label>
                    <input type="text" name="user_dateofbirth"/>
                    <p class="errorvalue">Please enter a date of birth</p>
                </p>

                <!--user_phone-->
                <p>
                    <label for="user_phoneNumber">Phone number </label>
                    <input type="tel" name="user_phoneNumber"/> 
                    <p class="errorvalue">Please enter a phone number</p>
                </p>

                <!--message-->
                <p>
                    <label for="user_message">Message </label>
                    <p class="errorvalue">Please enter a message</p>
                    <textarea type="text" name="user_message"></textarea>
                    
                   
                </p>
            </fieldset>
        
            <!--go ahead button-->
               <!-- <a href="#event_user_adress">next</a> -->
            <!--end button-->
            
<!--user adress tab-->
            <fieldset id="event_user_adress">
            <legend>Please give us your adress</legend>
               <!--user_street-->
                <p>
                    <label for="user_street">Street </label> 
                    <input type="text" name="user_street"  />
                    <p class="errorvalue">Please enter a street</p>
                </p>
                <p>
                    <label for="user_streetNumber">Number </label>
                    <input type="number" name="user_streetNumber"/>
                    <p class="errorvalue">Please enter a number</p>
                </p>
  
                

                <!--user_city-->
                <p>
                    <label for="user_cityNPA">NPA </label>
                    <input type="number" name="user_cityNPA"/>
                    <p class="errorvalue">Please enter a NPA</p>
                </p>
                <p>
                    <label for="user_city">City </label>
                    <input type="number" name="user_city"/>
                    <p class="errorvalue">Please enter a city</p>
 
                </p>

                <!--user_country-->
                <p>
                    <label for="user_country">Country </label>
                    <input type="text" name="user_country"/>
                    <p class="errorvalue">Please enter a country</p>
            </fieldset>

                    
            <!--go ahead button-->
               <!-- <a href="#event_user_motivation">next</a> -->
            <!--end button-->

    <!--user_motivation tab-->
            <fieldset id="event_user_motivation">
            <legend>Show us your motivations!</legend>

                    <!--user_keywords-->
                    <p>
                        <label for="user_kw">Keyword 1 </label>
                        <input type="text" name="user_kw" />
                        <p class="errorvalue">Please enter a keyword</p>
                    </p>
                    <p>
                        <label for="user_kw">Keyword 2 </label>
                        <input type="text" name="user_kw"  />
                        <p class="errorvalue">Please enter a keyword</p>
                    </p>
                    <p>
                        <label for="user_kw">Keyword 3 </label>
                        <input type="text" name="user_kw"  />
                        <p class="errorvalue">Please enter a keyword</p>
                    </p>

                    <!--user_motivation-->
                    <p>
                        <label for="user_motivation">Motivation </label>
                        <p class="errorvalue">Please enter your motivation</p>
                        <textarea type="text" name="user_motivation" rows="4" cols="26"></textarea>
                        
                    </p>
            </fieldset>
    
            <!--participation button-->
            <button class="theButton" type="button" onclick="alert("Hello world!")">Participate</button>
            <!--end of button-->
                
        </form>
  
    </section>
</article>