<!Doctype html>
<html lang="en">
    <head>
	    <meta charset="utf-8" />
	    <link rel="stylesheet" media="all" href="htdocs/css/style.css" />
	    <title>Project 143</title>
	</head>
    <body>
    <div id="container" class="container">
    <header id="globalheader">
	    <nav id="topheader">
		    <ul id="globalnav" class="offset2 span10">
                        <li id="gn-about">
                            <a {if  $topAction=='about'}class="selected"{/if} href="?action=about">About</a>
                        </li>
                        <li id="gn-events">
                            <a {if  $topAction=='events'}class="selected"{/if} href="?action=events">Events</a>
                        </li>
                        <li id="gn-videos">
                            <a {if  $topAction=='videos'}class="selected"{/if} href="?action=videos">Videos</a>
                        </li>
                        <li id="gn-partners">
                            <a {if  $topAction=='partners'}class="selected"{/if} href="?action=partners">Partners</a>
                        </li>
                        <li id="gn-press">
                            <a {if  $topAction=='press'}class="selected"{/if} href="?action=press">Press</a>
                        </li>
                        <li id="gn-contact">
                            <a {if  $topAction=='contact'}class="selected"{/if} href="?action=contact">Contact</a>
                        </li>
                        <li id="gn-gestion">
                            <a {if  $topAction=='gestion'}class="selected"{/if} href="?action=gestion">Gestion</a>
                        </li>
		    </ul>
		    {if $userIsLogged}
                        
		    	<div id="logout">
                            <a href="?action=logout">Logout</a>
			</div>
                        
                        <div id="userinfo">
                            <a href="?action=user_infos">{$username}</a>
                        </div>
				
                    {else}
                        <div id="login">
                            <a href="?action=login">Login</a>
                        </div>
                    {/if}
		    
	    </nav>
	    <nav id="bottomheader">
		    <a id="logo" href="?action=home"></a>
		    
		    <!-- Display the subnav if there is -->
		    {$subnav}
	    </nav>
    </header>
    
    <section id="content" class="{$topAction}">
    
		    <!-- Display the content of all page -->
			{$content}
			
    </section>
    
    <footer id="globalfooter">
		<p>This independent TEDx event is operated under license from TED.</p>
    </footer>   
    </div>
</body>