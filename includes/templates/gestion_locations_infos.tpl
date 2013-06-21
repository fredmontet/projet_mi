<article class="gestion_locations_infos">
    <!--add form location-->
    <form name="gestion_locations_infos" method="post" action="">
        <!--button save-->
        <p>
            <input type="hidden" name="action" value="gestion_locations_send" />
            <input type="submit" name="gestion_locations_send" value="Save" />
        </p>

        <!--name-->
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" value="{$name}"/>
        </p>
        <!--direction-->
        <p>
            <label for="direction">Direction</label>
            <input type="text" name="direction" value="{$direction}"/>
        </p>
        <!--address-->
        <p>
            <label for="address">Address</label>
            <input type="text" name="address" value="{$address}"/>
        </p>

        <!--city-->
        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="{$city}"/>
        </p>

        <!--country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="{$country}"/>
        </p>  
   </form>
   <!--end add form location-->         
</article>