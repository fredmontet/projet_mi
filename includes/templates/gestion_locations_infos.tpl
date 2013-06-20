<article class="gestion_locations_infos">
    <!--add form location-->
    <form method="post" action="">
        <!--button save-->
        <p>
            <input type="hidden" name="location" value="save" />
            <input type="submit" name="save" value="Save" />
        </p>

        <!--name-->
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" value="{$name}" style="width:200px" />
        </p>
        <!--direction-->
        <p>
            <label for="direction">Direction</label>
            <input type="text" name="direction" value="{$direction}" style="width:200px" />
        </p>
        <!--address-->
        <p>
            <label for="address">Address</label>
            <input type="text" name="address" value="{$address}" style="width:200px"/>
        </p>

        <!--city-->
        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="{$city}" style="width:200px" />
        </p>

        <!--country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="{$country}" style="width:200px" />
        </p>  
   </form>
   <!--end add form location-->         
</article>