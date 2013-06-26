{*
Smarty variables available:
 $location (Object)
*}

<div class="span6">
<!--form to create new locations-->
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
            <input type="text" name="name" value="{if $location != null}{$location->getName()}{/if}"/>
            <p class="errorvalue">Please enter a name</p>
        </p>
        <!--direction-->
        <p>
            <label for="direction">Direction</label>
            <input type="text" name="direction" value="{if $location != null}{$location->getDirection()}{/if}"/>
            <p class="errorvalue">Please enter a direction</p>
        </p>
        <!--address-->
        <p>
            <label for="address">Address</label>
            <input type="text" name="address" value="{if $location != null}{$location->getAddress()}{/if}"/>
            <p class="errorvalue">Please enter an address</p>
        </p>

        <!--city-->
        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="{if $location != null}{$location->getCity()}{/if}"/>
            <p class="errorvalue">Please enter a city</p>
        </p>

        <!--country-->
        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="{if $location != null}{$location->getCountry()}{/if}"/>
            <p class="errorvalue">Please enter a country</p>
        </p>  
   </form>
   <!--end add form location-->         
</article>
</div>