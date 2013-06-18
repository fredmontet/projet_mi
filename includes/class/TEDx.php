<?php
// Path to application root
define('TEDx_ROOTPATH', '');  

require_once(TEDx_ROOTPATH . 'config/TEDx.php');
require_once(TEDx_ROOTPATH . TEDx_SMARTY_DIR . 'Smarty.class.php');


/**
 * IHM for the TEDx gestion 
 */
class TEDx {    
   

    /**
     * Smarty object
     * @var smarty
     */
    protected $smarty;
    
    /**
     * TEDx Manager object 
     * @var tedx_manager
     */
    protected $tedx_manager;  
    
        
    /**
     * Constructor
     * Initializes TEDx Manager object and Smarty object
     * @param global var TEDx manager
     */
    public function __construct($tedx_manager) {
    
    	$this->tedx_manager = $tedx_manager;
        
        // Instantiates Smarty
        $tplDir = TEDx_ROOTPATH . TEDx_TPL_DIR;      
        $tplcDir = TEDx_ROOTPATH . TEDx_TPLC_DIR;      
        $this->smarty = new Smarty;
        $this->smarty->template_dir = $tplDir;
        $this->smarty->compile_dir = $tplcDir;
        
        $this->displayIHM(); 
     
    }       
	
	
	/**
     * Display error messages
     * @param string Id of the message to be displayed
     */
	protected function displayMessage($message) {
		switch($message) {
			case 'UnknownError':
				echo "Unknow Error";
			break;
			default:
				echo $message;
			break;
		}
	}
	
	
	/**
     * Get the next event
     * @return object the next event
     */    
    protected function getNextEvent() {
    	
    	$searchArgs = array(
		    "where"      => "StartingDate >= NOW()",
		    "orderBy"    => "StartingDate",
		    "orderByType" => "ASC",
		);
		 
		$messageSearchEvents = $this->tedx_manager->searchEvents($searchArgs);
		
		if($messageSearchEvents->getStatus()) {
		    $allValidSearchEvents = $messageSearchEvents->getContent();
		} else {
		    $this->displayMessage('There isn\'t a next event!'); 
	    }
	    
	    $aValidNextEvent = $allValidSearchEvents[0];
	    
		return $aValidNextEvent;
    }
    
    
    
    /**
     * Draw the Home page
     * @return content HTML of the Home page
     */
    protected function drawHome() {
    	
    	// get the next Event
		$aValidNextEvent = $this->getNextEvent();
		
		// Draw the next event
		$this->smarty->assign('nextEvent', $aValidNextEvent);
		$event_single = $this->smarty->fetch('event_single.tpl');
		
		// Draw video playlist
		$home_videos = $this->smarty->fetch('home_videos.tpl');
    	
    	// Assign variables
    	$this->smarty->assign('event_single', $event_single);
    	$this->smarty->assign('home_videos', $home_videos);
		
		// Draw Home page
		return $this->smarty->fetch('home.tpl');
    }
    
    
    /**
     * Draw the About page
     * @return content HTML of the About page
     */
    protected function drawAbout() {
		
		// Draw About page
		return $this->smarty->fetch('about.tpl');
    }
    
    
    /**
     * Draw the Events page
     * @return content HTML of the Events page
     */
    protected function drawEvents() {
    
    	$messageEvents = $this->tedx_manager->getEvents();
    	
    	if($messageEvents->getStatus()) {
		    $allValidEvents = $messageEvents->getContent();
		} else {
		    $this->displayMessage('There isn\'t event!'); 
	    }
		
		$this->smarty->assign('events', $allValidEvents);
		
	    return $this->smarty->fetch('events.tpl');
    }
    
    
    /**
     * Draw the Videos page
     * @return content HTML of the Videos page
     */
    protected function drawVideos() {
		
		// Draw Videos page
		return $this->smarty->fetch('videos.tpl');
    }
    
    
    /**
     * Draw the Partners page
     * @return content HTML of the Partners page
     */
    protected function drawPartners() {
		
		// Draw Partners page
		return $this->smarty->fetch('partners.tpl');
    }
    
    
    /**
     * Draw the Press page
     * @return content HTML of the Press page
     */
    protected function drawPress() {
		
		// Draw Press page
		return $this->smarty->fetch('press.tpl');
    }
    
    
    /**
     * Draw the Contact page
     * @return content HTML of the Contact page
     */
    protected function drawContact() {
	    return $this->smarty->fetch('contact.tpl');
    }
    
    
    /**
     * Draw the Gestion page
     * @return content HTML of the Gestion page
     */
    protected function drawGestion() {
    	$gestion_nav = $this->smarty->fetch('gestion_nav.tpl');
    	$this->smarty->assign('gestion_nav', $gestion_nav);
	    return $this->smarty->fetch('gestion_event.tpl');
    }
    
    
    /**
     * Draw the Gestion Create Event page
     * @return content HTML of the Gestion Create Event page
     */
    protected function drawGestionEventInfos() {
    	$gestion_nav = $this->smarty->fetch('gestion_nav.tpl');
    	$this->smarty->assign('gestion_nav', $gestion_nav);
    	
    	$messageEvent = $this->tedx_manager->getEvent(1);
    	
    	if($messageEvent->getStatus()) {
		    $aValidEvent = $messageEvent->getContent();
		} else {
		    $this->displayMessage('There isn\'t event!'); 
	    }
    	
	    $this->smarty->assign('event', $aValidEvent);
		
	    return $this->smarty->fetch('event_single.tpl');
    }
    
    
    /**
     * Draw the Gestion Speaker page
     * @return content HTML of the Gestion Speaker page
     */
    protected function drawGestionSpeaker() {
    	$gestion_nav = $this->smarty->fetch('gestion_nav.tpl');
    	$this->smarty->assign('gestion_nav', $gestion_nav);
	    return $this->smarty->fetch('gestion_speaker.tpl');
    }
    
    
    /**
     * Draw the Gestion Location page
     * @return content HTML of the Gestion Location page
     */
    protected function drawGestionLocation() {
    	$gestion_nav = $this->smarty->fetch('gestion_nav.tpl');
    	$this->smarty->assign('gestion_nav', $gestion_nav);
	    return $this->smarty->fetch('gestion_location.tpl');
    }
    
    
    /**
     * Draw the Gestion Location page
     * @return content HTML of the Gestion Location page
     */
    protected function drawGestionTeamRole() {
    	$gestion_nav = $this->smarty->fetch('gestion_nav.tpl');
    	$this->smarty->assign('gestion_nav', $gestion_nav);
	    return $this->smarty->fetch('gestion_team.tpl');
    }
    
    
    /**
     * Draw the User Info page
     * @return content HTML of the User Info page
     */
    protected function drawUserInfo() {
    	// Assign variables
	    //$this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    
	    return $this->smarty->fetch('userinfo.tpl');
    }
    
    
    /**
     * Draw the Login page
     * @return content HTML of the Login page
     */
    protected function drawLogin() {
    	// Assign variables
	    $this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    $this->tedx_manager->login('admin','admin');
	    return $this->smarty->fetch('login.tpl');
    }
    
    
    
    /**
     * Interprets the user action and returns the corresponding HTML
     * @return string HTML corresponding to the action selected by the user
     */
    protected function getContent($action) {
        switch($action) {
        	case 'home':
        		return $this->drawHome();
			break;
			case 'about':
				return $this->drawAbout();
			break;
			case 'events':
				return $this->drawEvents();
			break;	
			case 'videos':
				return $this->drawVideos();
			break;	
			case 'partners':
				return $this->drawPartners();
			break;	
			case 'press':
				return $this->drawPress();
			break;		
			case 'contact':
				return $this->drawContact();
			break;		
			case 'gestion':
				return $this->drawGestion();
			break;
			case 'gestion_event_infos':
				return $this->drawGestionEventInfos();
			break;
			case 'gestion_speaker':
				return $this->drawGestionSpeaker();
			break;		
			case 'gestion_location':
				return $this->drawGestionLocation();
			break;
			case 'gestion_team':
				return $this->drawGestionTeamRole();
			break;		
			case 'logout':
				$this->tedx_manager->logout();
				
				// Go to home page
				header("Location: ?action=home");
			break;
			case 'login':
				//$this->tedx_manager->login('Penelope','anitakevinlove');
				//
				return $this->drawLogin();
			break;
			case 'userinfo':
				return $this->drawUserInfo();
			break;
		}	
    }

    /**
     * Display IHM
     * Performs the corresponding action to action received POST or GET
     */
    private function displayIHM() {
	
        // Retrieving the current action, the default action: home
        if (isset($_REQUEST['action'])) {
		    $action = $_REQUEST['action'];
		} else {
		    $action = 'home';
		}
        
        // Assigns the current action (for menu display)       
        $this->smarty->assign('action', $action);
              
        // Retrieves the corresponding action chosen user HTML       
        try {
            $content = $this->getContent($action);
        } catch (Exception $e) {
            $this->displayMessage('UnknownError');        	
        }
        
        // Assigns user information to display  
        $this->smarty->assign('userIsLogged', $this->tedx_manager->isLogged());
        $this->smarty->assign('username', $this->tedx_manager->getUsername());
        
        // Assigns the content
        $this->smarty->assign('content', $content);

        // Display IHM
        $this->smarty->display('main.tpl');        
    }    
}

?>