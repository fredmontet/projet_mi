<!--gestion_locations_infos page-->
<article class="gestion_locations_infos">
        <!--add form location-->
        <form method="post" action="">
	        <p>
                    <input type="hidden" name="location" value="save" />
                    <input type="submit" name="save" value="Save" />
	        </p>
	
	        <!--name-->
	        <p>
	            <input type="text" name="name" value="{$name}" style="width:200px" />
	        </p>
                <!--direction-->
	        <p>
	            <input type="text" name="direction" value="{$direction}" style="width:200px" />
	        </p>
	        <!--address-->
	        <p>
	            <input type="text" name="address" value="{$address}" style="width:200px"/>
	        </p>
	
	        <!--city-->
	        <p>
	            <input type="text" name="city" value="{$city}" style="width:200px" />
	        </p>
	
	        <!--country-->
	        <p>
	            <input type="text" name="country" value="{$country}" style="width:200px" />
	        </p>  
       </form>
       <!--end add form location-->         
</article>