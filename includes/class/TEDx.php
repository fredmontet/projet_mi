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
			default:
				echo "<p id=\"errormessage\">" . $message . "</p>";
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
     * Get the id of the object
     * @return int id of the next object
     */    
    protected function getId() {
	    if (isset($_REQUEST['id'])) {
		    $id = $_REQUEST['id'];
		} else {
		    $id = null;
		}
		
		return $id;
    }
    
    
    
    /**
     * Draw the Home page
     * @return content HTML of the Home page
     */
    protected function drawHome() {
    	
    	// get the next Event
		$aValidNextEvent = $this->getNextEvent();
		$id = $aValidNextEvent->getNo();
		
		// Draw the next Event
		$events_single = $this->drawEventsSingle($id);
		
		// Draw video playlist
		$video_list = $this->smarty->fetch('videos_list.tpl');
    	
    	// Assign variables to Smarty
    	$this->smarty->assign('events_single', $events_single);
    	$this->smarty->assign('videos_list', $video_list);
		
		// Draw Home page
		return $this->smarty->fetch('home.tpl');
    }
    
    
    /**
     * Draw the About navigator
     * @return content HTML of the About navigator
     */
    protected function drawAboutNav() {
		
		// Draw About page
		return $this->smarty->fetch('about_nav.tpl');
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
     * Draw the Event single page
     * @return content HTML of the Event single page
     */
    protected function drawEventsSingle($id) {
    	
    	// Get Event
    	$messageEvent = $this->tedx_manager->getEvent($id);
    	
    	if($messageEvent->getStatus()) {
		    $aValidEvent = $messageEvent->getContent();
		    
		    // Get Location
			$messageLocation = $this->tedx_manager->getLocationFromEvent($aValidEvent);
			
			
			if($messageLocation->getStatus()) {
			    $aValidLocation = $messageLocation->getContent();
			} else {
			    $this->displayMessage('No location found!');
			    $aValidLocation = null;
			}    
					    
			$this->smarty->assign('location', $aValidLocation); 
			$this->smarty->assign('event', $aValidEvent);
			
			return $this->smarty->fetch('events_single.tpl');
			
		} else {
		    $this->displayMessage('There isn\'t event!'); 
		    return null;
	    }	
    }
    
    
    /**
     * Draw the Event Registration page
     * @return content HTML of the Event Registration page
     */
    protected function drawEventRegistration() {
    
    	$messageEvent = $this->tedx_manager->getEvent(1);
    	
    	if($messageEvent->getStatus()) {
		    $aValidEvent = $messageEvent->getContent();
		} else {
		    $this->displayMessage('There isn\'t event!'); 
	    }
		
		$this->smarty->assign('event', $aValidEvent);
		
	    return $this->smarty->fetch('event_registration.tpl');
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
     * Draw the Partners navigator
     * @return content HTML of the Partners navigator
     */
    protected function drawPartnersNav() {
	    return $this->smarty->fetch('partners_nav.tpl');
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
     * Draw Gestion navigator
     * @return content HTML of the Gestion navigator
     */
    protected function drawGestionNav() {
	    return $this->smarty->fetch('gestion_nav.tpl');
    }
    
    
    /**
     * Draw the Gestion page
     * @return content HTML of the Gestion page
     */
    protected function drawGestion() {
    	$action = 'gestion_event';
	    return $this->drawGestionEvent($action);
    }

    
    /**
     * Draw the Gestion Event page
     * @return content HTML of the Gestion Event page
     */
    protected function drawGestionEvent($action) {
    	$gestionEventNav = $this->smarty->fetch('gestion_event_nav.tpl');
    	$this->smarty->assign('gestionEventNav', $gestionEventNav);
    	
    	
    	switch($action) {
	    	case 'gestion_event':
	    	case 'gestion_event_list':
	    		$messageEvents = $this->tedx_manager->getEvents();
    	
		    	if($messageEvents->getStatus()) {
				    $allValidEvents = $messageEvents->getContent();
				} else {
				    $this->displayMessage('There isn\'t event!'); 
			    }
				
				$this->smarty->assign('events', $allValidEvents);
	    	
	    		$gestionEventList = $this->smarty->fetch('gestion_event_list.tpl');
				$this->smarty->assign('gestionEventContent', $gestionEventList);
	    	break;
	    	
	    	case 'gestion_event_single':
	    		$id = $this->getId();
	    		
	    		if($id != null) {
		    		$messageEvent = $this->tedx_manager->getEvent($id);
		    		
					if($messageEvent->getStatus()) {
					    $aValidEvent = $messageEvent->getContent();
					} else {
					    $this->displayMessage('There isn\'t event!'); 
				    }
				
					$this->smarty->assign('event', $aValidEvent);
					
	    		} else {
		    		$this->displayMessage('There isn\'t an event with this id.');
	    		}
	    		
	    		$gestionEventSingle = $this->smarty->fetch('gestion_event_single.tpl');
				$this->smarty->assign('gestionEventContent', $gestionEventSingle);
	    	break;
	    	
	    	case 'gestion_event_motivation':
	    		$gestionEventMotivation = $this->smarty->fetch('gestion_event_motivation.tpl');
				$this->smarty->assign('gestionEventContent', $gestionEventMotivation);
	    	break;
	    	
	    	case 'gestion_event_mail':
	    		$gestionEventMail = $this->smarty->fetch('gestion_event_mail.tpl');
				$this->smarty->assign('gestionEventContent', $gestionEventMail);
	    	break;
	    	
	    	case 'gestion_event_role':
	    		$gestionEventRoleInfo = $this->smarty->fetch('gestion_event_role_info.tpl');
				$this->smarty->assign('gestionEventRoleInfo', $gestionEventRoleInfo);
	    		
	    		$gestionEventRole = $this->smarty->fetch('gestion_event_role.tpl');
				$this->smarty->assign('gestionEventContent', $gestionEventRole);
	    	break;
    	}
		
	    return $this->smarty->fetch('gestion_event.tpl');
    }
    
    protected function drawGestionSpeaker() {
	    $gestionSpeakerInfos = $this->smarty->fetch('gestion_speaker_infos.tpl');
	    $this->smarty->assign('gestionSpeakerInfos', $gestionSpeakerInfos);
	    
	    return $this->smarty->fetch('gestion_speaker.tpl');
    }
    
    protected function drawGestionLocation($action) {
		switch ($action) {
			case 'gestion_location_infos':
				$gestionLocationInfos = $this->drawGestionLocationInfos($action);
				
			break;
			default:
				$gestionLocationInfos = null;
			break;
		}

	    $this->smarty->assign('gestionLocationInfos', $gestionLocationInfos);
	    
	    return $this->smarty->fetch('gestion_location.tpl');
    }
    
    
    protected function drawGestionLocationInfos($action) {
	    $id = $this->getId();
	    
	    switch ($action) {
	    	case 'gestion_location_edit':
		    	$direction = $_POST['direction'];            
		        $address = $_POST['address'];
		        $city = $_POST['city'];
		        $country = $_POST['country'];
		    break;
		    default:
		    	$direction = null;            
		        $address = null;
		        $city = null;
		        $country = null;
		    break;
    	}
    	
    	$this->smarty->assign('direction', $direction);
    	$this->smarty->assign('address', $address);
    	$this->smarty->assign('city', $city);
    	$this->smarty->assign('country', $country);
		
		$messageLocation = $this->tedx_manager->getLocation($id);
			
		if($messageLocation->getStatus()) {
		    $aValidLocation = $messageLocation->getContent();
		} else {
		    $this->displayMessage('No location found!');
		}    
				    
		$this->smarty->assign('location', $aValidLocation);
    }
    
    
    /**
     * Draw the Gestion Team page
     * @return content HTML of the Gestion Team page
     */
    protected function drawGestionTeam($action) {
    	$gestionTeamNav = $this->smarty->fetch('gestion_team_nav.tpl');
    	$this->smarty->assign('gestionTeamNav', $gestionTeamNav);
    	
    	switch($action) {
    		case 'gestion_team':
	    	case 'gestion_team_affect':
	    		$gestionTeamAffectInfos = $this->smarty->fetch('gestion_team_affect_infos.tpl');
				$this->smarty->assign('gestionTeamAffectInfos', $gestionTeamAffectInfos);
	    	
	    		$gestionTeamAffect = $this->smarty->fetch('gestion_team_affect.tpl');
				$this->smarty->assign('gestionTeamContent', $gestionTeamAffect);
	    	break;
	    	
	    	case 'gestion_team_edit':
	    		$gestionTeamEditInfos = $this->smarty->fetch('gestion_team_edit_infos.tpl');
				$this->smarty->assign('gestionTeamEditInfos', $gestionTeamEditInfos);
	    	
	    		$gestionTeamEdit = $this->smarty->fetch('gestion_team_edit.tpl');
				$this->smarty->assign('gestionTeamContent', $gestionTeamEdit);
	    	break;
	    }
	    
	    return $this->smarty->fetch('gestion_team.tpl');
    }
    
    
    /**
     * Draw the Login page
     * @return content HTML of the Login page
     */
    protected function drawLogin() {
    	// Assign variables
	    //$this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    $this->tedx_manager->login('admin','admin');
	    return $this->smarty->fetch('login.tpl');
    }
    
    
    /**
     * Draw the User Infos page
     * @return content HTML of the User Infos page
     */
    protected function drawUserInfos() {
    	// Assign variables
	    //$this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    
	    return $this->smarty->fetch('userinfo.tpl');
    }
    
    
    /**
     * Draw the Register page
     * @return content HTML of the Register page
     */
    protected function drawRegister() {
	    return $this->smarty->fetch('register.tpl');
    }

    
    /**
     * Interprets the user action and returns the corresponding HTML
     * @return string HTML corresponding to the action selected by the user
     */
    protected function getContent($action) {
        switch($action) {
        
        	// Home
        	case 'home':
        		$topAction = 'home';
        		
        		try {
        			$subnav = null;
		            $content = $this->drawHome();
		        } catch (Exception $e) {
		            $this->displayMessage('The home page doesn\'t exist!');
		            $content = null;        	
		        }
        		
			break;
			
			/*
			
			// About
        	case 'about':
        		$topAction = 'about';
        		
        		try {
        			$subnav = $this->drawAboutNav();
		            $content = $this->drawAbout();
		        } catch (Exception $e) {
		            $this->displayMessage('The home page doesn\'t exist!');
		            $content = null;        	
		        }
        		
			break;
			
			// Events
        	case 'events':
        		$topAction = 'events';
        		
        		try {
        			$subnav = null;
		            $content = $this->drawEvents();
		        } catch (Exception $e) {
		            $this->displayMessage('The home page doesn\'t exist!');
		            $content = null;        	
		        }
        		
			break;
			
			// Events registration
        	case 'events_registration':
        		$topAction = 'events_registration';
        		
        		try {
        			$subnav = null;
		            $content = null;
		        } catch (Exception $e) {
		            $this->displayMessage('The home page doesn\'t exist!');
		            $content = null;        	
		        }
        		
			break;
			
			*/
			
			// About
			case 'about':
				$topAction = 'about';
				
				try {
		            $subnav = $this->drawAboutNav();
					$content = $this->drawAbout();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
			
			// Events
			case 'events':
				$topAction = 'events';
				
				try {
		            $subnav = null;
					$content = $this->drawEvents();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;        	
		        }
			break;	
			
			// Events
			case 'event_single':
				$topAction = 'events';
				
				$id = $this->getId();
				
				try {
		            $subnav = null;
					$content = $this->drawEventSingle($id);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;	
			
			// Event registration
			case 'event_registration':
				$topAction = 'event';
				
				try {
		            $subnav = null;
					$content = $this->drawEventRegistration();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
			
			// Videos
			case 'videos':
				$topAction = 'videos';
				
				try {
		            $subnav = null;
					$content = $this->drawVideos();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
			
			// Partners
			case 'partners':
				$topAction = 'partners';
				
				try {
		            $subnav = $this->drawPartnersNav();
					$content = $this->drawPartners();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
				
			
			// Press
			case 'press':
				$topAction = 'press';
				
				try {
		            $subnav = null;
					$content = $this->drawPress();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
			
			// Contact
			case 'contact':
				$topAction = 'contact';
				
				try {
		            $subnav = null;
					$content = $this->drawContact();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;        	
		        }
			break;
			
			// Gestion
			case 'gestion':
				$topAction = 'gestion';
				
				try {
		            $subnav = $this->drawGestionNav();
					$content = $this->drawGestion();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
			
			// Gestion Event
			case 'gestion_event':
			case 'gestion_event_list':
			case 'gestion_event_single':
			case 'gestion_event_motivation':
			case 'gestion_event_mail':
			case 'gestion_event_role':
				$topAction = 'gestion';
				
				try {
		            $subnav = $this->drawGestionNav();
					$content = $this->drawGestionEvent($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;        	
		        }
			break;
			
			// Gestion Speaker
			case 'gestion_speaker':
				$topAction = 'gestion';
				
				try {
		            $subnav = $this->drawGestionNav();
					$content = $this->drawGestionSpeaker();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;        	
		        }
			break;
			
			// Gestion Location
			case 'gestion_location':
			case 'gestion_location_edit':
				$topAction = 'gestion';
				
				try {
		            $subnav = $this->drawGestionNav();
					$content = $this->drawGestionLocation($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;        	
		        }
			break;
			
			// Gestion Team
			case 'gestion_team':
			case 'gestion_team_affect':
			case 'gestion_team_edit':
				$topAction = 'gestion';
				
				try {
		            $subnav = $this->drawGestionNav();
					$content = $this->drawGestionTeam($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');  
		            $content = null;       	
		        }
			break;
			
			// Login
			case 'login':
				$topAction = 'login';
				//$this->tedx_manager->login('Penelope','anitakevinlove');
				
				try {
					$subnav = null;
					$content = $this->drawLogin();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');    
		            $content = null;     	
		        }
			break;
					
			// Logout
			case 'logout':
				$topAction = 'logout';
				
				try {
		            $subnav = null;
		            $content = null;
		            $this->tedx_manager->logout();
		        } catch (Exception $e) {
		            $this->displayMessage('You can\t logout.');  
		            $content = null;       	
		        }
				
				// Go to home page
				header("Location: ?action=home");
			break;
			
			// User infos
			case 'user_infos':
				$topAction = 'user_infos';
								
				try {
		            $subnav = null;
					$content = $this->drawUserInfos();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;         	
		        }
			break;
			
			// Register
			case 'register':
				$topAction = 'register';
								
				try {
		            $subnav = null;
					$content = $this->drawRegister();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');   
		            $content = null;      	
		        }
			break;
			
			// Default
			default:
        		$topAction = 'home';
        		$subnav = null;
        		
        		try {
		            $content = $this->drawHome();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');     
		            $content = null;    	
		        }
		        
		        
        		
		}	
		
		$subAction = $action;
		
		// Return all variables
		return array($topAction, $subAction, $subnav, $content);
		
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
        
        // Retrieves the corresponding action chosen user HTML       
        try {
            list ($topAction, $subAction, $subnav, $content) = $this->getContent($action);
        } catch (Exception $e) {
            $this->displayMessage('There is no content.'); 
            $topAction = null;
            $subAction = null;
            $subnav = null;
            $content = null;
        }
        
        // Assigns the current action (for menu display)       
        $this->smarty->assign('topAction', $topAction);
        
        // Assigns user information to display  
        $this->smarty->assign('userIsLogged', $this->tedx_manager->isLogged());
        $this->smarty->assign('username', $this->tedx_manager->getUsername());
        
        // Assigns the subnav
        $this->smarty->assign('subnav', $subnav);
        
        // Assigns the content
        $this->smarty->assign('content', $content);

        // Display IHM
        $this->smarty->display('main.tpl');        
    }    
}

?>