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
		    $allValideSearchEvents = $messageSearchEvents->getContent();
		} else {
		    $this->displayMessage('There isn\'t a next event!'); 
	    }
	    
	    $aValideNextEvent = $allValideSearchEvents[0];
	    
		return $aValideNextEvent;
    }
    
    
    
    /**
     * Draw the Home page
     * @return content HTML of the Home page
     */
    protected function drawHome() {
    	
    	// get the next Event
		$aValideNextEvent = $this->getNextEvent();
		
		// Draw the next event
		$this->smarty->assign('nextEvent', $aValideNextEvent);
		$home_event = $this->smarty->fetch('home_event.tpl');
		
		// Draw video playlist
		$home_videos = $this->smarty->fetch('home_videos.tpl');
    	
    	// Assign variables
    	
    	$this->smarty->assign('home_videos', $home_videos);
		
		// Draw Home page
		return $this->smarty->fetch('home.tpl');
    }
    
    
    /**
     * Draw the Events page
     * @return content HTML of the Events page
     */
    protected function drawEvents() {
    
    	$messageEvents = $this->tedx_manager->getEvents();
    	
    	if($messageEvents->getStatus()) {
		    $allValideEvents = $messageEvents->getContent();
		} else {
		    $this->displayMessage('There isn\'t event!'); 
	    }
		
		$this->smarty->assign('events', $allValideEvents);
		
	    return $this->smarty->fetch('events.tpl');
    }
    
    
    /**
     * Draw the Contact page
     * @return content HTML of the Contact page
     */
    protected function drawContact() {
	    return $this->smarty->fetch('contact.tpl');
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
     * Interprets the user action and returns the corresponding HTML
     * @return string HTML corresponding to the action selected by the user
     */
    protected function getContent($action) {
        switch($action) {
        	case 'home':
        		return $this->drawHome();
			break;
			case 'about':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/about.html');
			break;
			case 'events':
				return $this->drawEvents();
			break;	
			case 'videos':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/videos.html');
			break;	
			case 'partners':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/partners.html');
			break;	
			case 'press':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/press.html');
			break;		
			case 'contact':
				return $this->drawContact();
			break;		
			case 'gestion':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/gestion.html');
			break;				
			case 'logout':
				$this->tedx_manager->logout();
				
				// Go to home page
				header("Location: ?action=home");
			break;
			case 'login':
				//$this->tedx_manager->login('Penelope','anitakevinlove');
				$this->tedx_manager->login('admin','admin');
			break;
			case 'userinfo':
				return $this->drawUserInfo();
			break;
		}	
    }

    /**
     * Main entry point
     * Performs the corresponding action to action received POST or GET
     */
    public function main() {
	
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