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
                <!--user_firstName-->
                <p>
                    <label for="firsName">First name</label>
                    <input type="text" name="firstName"/>
                    <p class="errorvalue">Please enter a first name</p>
                    
                </p>

                <!--user_name-->
                <p>
                    <label for="name">Name</label>
                    <input type="text" name="name"/>
                    <p class="errorvalue">Please enter a name</p>
                </p>

                <!--user_email-->
                <p>
                    <label for="email">Email </label>
                    <input type="email" name="email"/>
                    <p class="errorvalue">Please enter an email</p>
                </p>

                <p>
                    <label for="email">Repeat email </label>
                    <input type="email" name="email"/>
                    <p class="errorvalue">Please repeat the email</p>
                </p>

                <!--user_pw-->
                <p>
                    <label for="password">Password </label>
                    <input type="text" name="password"/>
                    <p class="errorvalue">Please enter a password</p>
                </p>

                <p>
                    <label for="password">Repeat password </label>
                    <input type="text" name="password"/>
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
                    <label for="dateOfBirth">Date of birth </label>
                    <input type="text" name="dateOfBirth"/>
                    <p class="errorvalue">Please enter a date of birth</p>
                </p>

                <!--user_phone-->
                <p>
                    <label for="phoneNumber">Phone number </label>
                    <input type="tel" name="phoneNumber"/> 
                    <p class="errorvalue">Please enter a phone number</p>
                </p>

                <!--message-->
                <p>
                    <label for="description">Description </label>
                    <p class="errorvalue">Please enter a message</p>
                    <textarea type="text" name=description"></textarea>
                    
                   
                </p>
            </fieldset>
        
            <!--go ahead button-->
               <!-- <a href="#event_user_adress">next</a> -->
            <!--end button-->
            
<!--user adress tab-->
            <fieldset id="adress">
            <legend>Please give us your adress</legend>
               <!--user_street-->
                <p>
                    <label for="address">Street </label> 
                    <input type="text" name="address"  />
                    <p class="errorvalue">Please enter a street</p>
                </p>

                <!--user_city-->

                <p>
                    <label for="city">City </label>
                    <input type="number" name="city"/>
                    <p class="errorvalue">Please enter a city</p>
 
                </p>

                <!--user_country-->
                <p>
                    <label for="country">Country </label>
                    <input type="text" name="country"/>
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
                        <label for="keyword1">Keyword 1 </label>
                        <input type="text" name="keyword1" />
                        <p class="errorvalue">Please enter a keyword</p>
                    </p>
                    <p>
                        <label for="keyword2">Keyword 2 </label>
                        <input type="text" name="keyword2"  />
                        <p class="errorvalue">Please enter a keyword</p>
                    </p>
                    <p>
                        <label for="keyword3">Keyword 3 </label>
                        <input type="text" name="keyword3"  />
                        <p class="errorvalue">Please enter a keyword</p>
                    </p>

                    <!--user_motivation-->
                    <p>
                        <label for="motivation">Motivation </label>
                        <p class="errorvalue">Please enter your motivation</p>
                        <textarea type="text" name="motivation" rows="4" cols="26"></textarea>
                        
                    </p>
            </fieldset>
    
            <p>
                <input type="hidden" name="id" value="{$event->getNo()}" />
                <input type="hidden" name="action" value="events_registrations" />
                <input class="buttonSave" type="submit" name="update" value="Save" />
            </p>
                
        </form>
  
    </section>
</article>