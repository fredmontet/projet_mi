<article>
        <form id="location" method="post" action="">
	        <p>
		        <input type="hidden" name="location" value="save" />
		        <input type="submit" name="save" value="Save" />
	        </p>
	
	        <!--direction-->
	        <p>
	            <label for="name">Direction </label>
	            <input type="text" name="direction" value="{$direction}" style="width:200px" />
	        </p>
	        <!--address-->
	        <p>
	            <label for="address">Address </label>
	            <input type="text" name="address" value="{$address}" style="width:200px"/>
	        </p>
	
	        <!--city-->
	        <p>
	            <label for="city">City </label>
	            <input type="text" name="city" value="{$city}" style="width:200px" />
	        </p>
	
	        <!--country-->
	        <p>
	            <label for="country">Country </label>
	            <input type="text" name="country" value="{$country}" style="width:200px" />
	        </p>  
       </form>
</article>