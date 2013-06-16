<!Doctype html>
<html lang="en">
    <head>
	    <meta charset="utf-8" />
	    <link rel="stylesheet" media="all" href="htdocs/css/style.css" />
	    <title>project 143</title>
	</head>
    <body>
    <header id="globalheader">
	    <nav id="topheader">
		    <ul id="globalnav">
			    <li id="gn-about"><a {if $action=='about'}class="selected"{/if} href="?action=about">About</a></li>
			    <li id="gn-events"><a {if $action=='events'}class="selected"{/if} href="?action=events">Events</a></li>
			    <li id="gn-videos"><a {if $action=='videos'}class="selected"{/if} href="?action=videos">Videos</a></li>
			    <li id="gn-partners"><a {if $action=='partners'}class="selected"{/if} href="?action=partners">Partners</a></li>
				<li id="gn-press"><a {if $action=='press'}class="selected"{/if} href="?action=press">Press</a></li>
				<li id="gn-contact"><a {if $action=='contact'}class="selected"{/if} href="?action=contact">Contact</a></li>
				<li id="gn-gestion"><a {if $action=='gestion'}class="selected"{/if} href="?action=gestion">Gestion</a></li>
		    </ul>
		    {if $userIsLogged}
		    	<div id="logout">
					<a href="?action=logout">Logout</a>
				</div>
				<div id="userinfo">
		    		<a href="?action=userinfo">{$username}</a>
				</div>
				
			{else}
				<div id="login">
		    		<a href="?action=login">Login</a>
				</div>
		  	{/if}
		    
	    </nav>
	    <nav id="bottomheader">
		    <a id="logo" href="?action=home"></a>
			{$content}
    <footer id="globalfooter">
		<p>This independent TEDx event is operated under license from TED.</p>
	</footer>
</body>