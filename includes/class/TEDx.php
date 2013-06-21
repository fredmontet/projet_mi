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
		
		foreach ($allValidEvents as $aValidEvent) {
			$events[] = $this->drawEventsSingle($aValidEvent->getNo());
		}
		
		$events_nav = $this->smarty->fetch('events_nav.tpl');
		
		$this->smarty->assign('events', $events);
		$this->smarty->assign('events_nav', $events_nav);
		
	    return $this->smarty->fetch('events.tpl');
    }
    
    /**
     * Draw the Event single page
     * @return content HTML of the Event single page
     */
    protected function drawEventsSingle($id) {
    	
    	// Get an Event
    	$messageEvent = $this->tedx_manager->getEvent($id);
    	
    	// If the Event is found, continue
    	if($messageEvent->getStatus()) {
		    $aValidEvent = $messageEvent->getContent();
		    
		    // Get Location
			$messageLocation = $this->tedx_manager->getLocationFromEvent($aValidEvent);
			
			// If the Location is found, continue
			if($messageLocation->getStatus()) {
			    $aValidLocation = $messageLocation->getContent();
			    
			} else {
				// Else give the error message about no found Location
			    $aValidLocation = null;
			}
			
			// Get Slot
			$messageSlots = $this->tedx_manager->getSlotsFromEvent($aValidEvent);   
			
            // If Slots are found, continue
			if($messageSlots->getStatus()) {
				$allValidSlots = $messageSlots->getContent();
				
	            // For each Valid Slots
				foreach($allValidSlots as $aValidSlot) {
					
					// Get Places in a Slot
					$messagePlaces = $this->tedx_manager->getPlacesBySlot($aValidSlot);
					
					// If Places are found, continue
					if($messagePlaces->getStatus()) {
						$allValidPlaces = $messagePlaces->getContent();		
						
						// For each Valid Places	
						foreach($allValidPlaces as $aValidPlace) {
							
							// Get Speaker at Place
							$messageSpeaker = $this->tedx_manager->getSpeakerByPlace($aValidPlace);
							
							// If Speaker is found, continue
							if($messageSpeaker->getStatus()) {
								$aValidSpeaker = $messageSpeaker->getContent();
								
								// Prepare an array for Smarty [Slots][Places][Speaker]
								$speakers	[$aValidSlot->getNo()]
											[$aValidPlace->getNo()]
											[$aValidSpeaker->getNo()] = $aValidSpeaker;
								
							} else {
								// Else give the error message about no found Speaker
								$aValidSpeaker = null;
								$speakers [$aValidSlot->getNo()] = null;
							}
						}
					} else {
						// Else give the error message about no found Place
						$allValidPlaces = null;
						$speakers [$aValidSlot->getNo()] = null;
					}
				}
			} else {
				// Else give the error message about no found Slots
				$allValidSlots = null;
				$speakers = null;
			}
			
			// Assigns variables to Smarty
			$this->smarty->assign('speakers', $speakers);
			$this->smarty->assign('slots', $allValidSlots);
			$this->smarty->assign('location', $aValidLocation); 
			$this->smarty->assign('event', $aValidEvent);
			
			// Return a single event
			return $this->smarty->fetch('events_single.tpl');
			
		} else {
			// Else give the error message about no found Event
		    $this->displayMessage($messageEvent->getMessage()); 
		    return null;
	    }	
    }
    
    
    /**
     * Draw the Event Registration page
     * @return content HTML of the Event Registration page
     */
    protected function drawEventsRegistration() {
    	$id = $this->getId();
    
    	$messageEvent = $this->tedx_manager->getEvent($id);
    	
    	if($messageEvent->getStatus()) {
		    $aValidEvent = $messageEvent->getContent();
		} else {
		    $this->displayMessage('There isn\'t event!'); 
	    }
		
		$this->smarty->assign('event', $aValidEvent);
		
	    return $this->smarty->fetch('events_registration.tpl');
    }
	
    /**
     * Draw the Events participate page
     * @return content HTML of the Events participate page
     */
    protected function drawEventsParticipate() {
		$this->displayMessage('This action is not yet implemented.');
    	return null;
    }
    
    
    /**
     * Draw the Videos page
     * @return content HTML of the Videos page
     */
    protected function drawVideos() {
		
		// Draw Videos page
		return $this->smarty->fetch('videos_all.tpl');
    }
    
    /**
     * Draw the Videos Event page
     * @return content HTML of the Videos Event page
     */
    protected function drawVideosEvent() {
		
		// Draw Videos page
		return $this->smarty->fetch('videos_event.tpl');
    }
    
    /**
     * Draw the Videos navigator
     * @return content HTML of the Videos navigator
     */
    protected function drawVideosNav() {
		
		// Draw Videos page
		return $this->smarty->fetch('videos_nav.tpl');
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
		return $this->smarty->fetch('partners.tpl');
    }
    
    
    /**
     * Draw the Press page
     * @return content HTML of the Press page
     */
    protected function drawPress() {
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
     * Draw the Contact page
     * @return content HTML of the Contact page
     */
    protected function drawContactReceived() {
	    return $this->smarty->fetch('contact_received.tpl');
    }
    
    
    /**
     * Draw Gestion navigator
     * @return content HTML of the Gestion navigator
     */
    protected function drawGestionNav($subAction) {
    	$this->smarty->assign('subAction', $subAction);
	    return $this->smarty->fetch('gestion_nav.tpl');
    }
    
    
    /**
     * Draw the Gestion page
     * @return content HTML of the Gestion page
     */
    protected function drawGestion() {
    	$action = 'gestion_events';
	    return $this->drawGestionEvents($action);
    }

    
    /**
     * Draw the Gestion Event page
     * @return content HTML of the Gestion Event page
     */
    protected function drawGestionEvents($action) {
    	$gestionEventsNav = $this->smarty->fetch('gestion_events_nav.tpl');
    	$this->smarty->assign('gestionEventsNav', $gestionEventsNav);
    	
    	
    	switch($action) {
    		case 'add_slot':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'add_speaker_to_slot':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'gestion_events_send':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'add_organizer_to_event':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'gestion_event_export':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'motivation_refuse':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
			case 'motivation_wait':
				$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
			case 'motivation_accept':
				$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'mail_send':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
    		case 'gestion_events_role_send':
    			$this->displayMessage('This action is not yet implemented.');
				return null;
    		break;
	    	case 'gestion_events':
	    	case 'gestion_events_list':
	    		$messageEvents = $this->tedx_manager->getEvents();
    	
		    	if($messageEvents->getStatus()) {
				    $allValidEvents = $messageEvents->getContent();
				} else {
				    $this->displayMessage('There isn\'t event!'); 
			    }
				
				$this->smarty->assign('events', $allValidEvents);
	    	
	    		$gestionEventsList = $this->smarty->fetch('gestion_events_list.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsList);
	    	break;
	    	
	    	case 'gestion_events_single':
	    	case 'gestion_speaker_infos':
	    	case 'gestion_speaker_infos_send':
	    		
	    		switch($action) {
		    		case 'gestion_speaker_infos':
		    			$gestionEventsSpeakerInfos = $this->smarty->fetch('gestion_events_speaker_infos.tpl');
					    $this->smarty->assign('gestionEventsSpeakerInfos', $gestionEventsSpeakerInfos);
		    		break;
		    		case 'gestion_speaker_infos_send':
		    			$this->displayMessage('This action is not yet implemented.');
						return null;
						$this->smarty->assign('gestionEventsSpeakerInfos', null);
		    		break;
		    		default:
		    			$this->smarty->assign('gestionEventsSpeakerInfos', null);
		    		break;
	    		}
	    	
	    		$id = $this->getId();
	    		
	    		if($id != null) {
		    		// Get an Event
			    	$messageEvent = $this->tedx_manager->getEvent($id);
			    	
			    	// If the Event is found, continue
			    	if($messageEvent->getStatus()) {
					    $aValidEvent = $messageEvent->getContent();
					    
					    // Get Location
						$messageLocation = $this->tedx_manager->getLocationFromEvent($aValidEvent);
						
						// If the Location is found, continue
						if($messageLocation->getStatus()) {
						    $aValidLocation = $messageLocation->getContent();
						    
						} else {
							// Else give the error message about no found Location
						    $aValidLocation = null;
						}
						
						// Get Slot
						$messageSlots = $this->tedx_manager->getSlotsFromEvent($aValidEvent);   
						
			            // If Slots are found, continue
						if($messageSlots->getStatus()) {
							$allValidSlots = $messageSlots->getContent();
							
				            // For each Valid Slots
							foreach($allValidSlots as $aValidSlot) {
								
								// Get Places in a Slot
								$messagePlaces = $this->tedx_manager->getPlacesBySlot($aValidSlot);
								
								// If Places are found, continue
								if($messagePlaces->getStatus()) {
									$allValidPlaces = $messagePlaces->getContent();		
									
									// For each Valid Places	
									foreach($allValidPlaces as $aValidPlace) {
										
										// Get Speaker at Place
										$messageSpeaker = $this->tedx_manager->getSpeakerByPlace($aValidPlace);
										
										// If Speaker is found, continue
										if($messageSpeaker->getStatus()) {
											$aValidSpeaker = $messageSpeaker->getContent();
											
											// Prepare an array for Smarty [Slots][Places][Speaker]
											$speakers	[$aValidSlot->getNo()]
														[$aValidPlace->getNo()]
														[$aValidSpeaker->getNo()] = $aValidSpeaker;
											
										} else {
											// Else give the error message about no found Speaker
											$aValidSpeaker = null;
											$speakers [$aValidSlot->getNo()] = null;
										}
									}
								} else {
									// Else give the error message about no found Place
									$allValidPlaces = null;
									$speakers [$aValidSlot->getNo()] = null;
								}
							}
						} else {
							// Else give the error message about no found Slots
							$allValidSlots = null;
							$speakers = null;
						}
						
						// Assigns variables to Smarty
						$this->smarty->assign('speakers', $speakers);
						$this->smarty->assign('slots', $allValidSlots);
						$this->smarty->assign('location', $aValidLocation); 
						$this->smarty->assign('event', $aValidEvent);
						
					} else {
						// Else give the error message about no found Event
					    $this->displayMessage($messageEvent->getMessage()); 
				    }	

					
	    		} else {
		    		$this->displayMessage('There isn\'t an event with this id.');
	    		}
	    		
	    		$gestionEventsSingle = $this->smarty->fetch('gestion_events_single.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsSingle);
	    	break;
	    	
	    	case 'gestion_events_motivation':
	    		$gestionEventsMotivation = $this->smarty->fetch('gestion_events_motivation.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsMotivation);
	    	break;
	    	
	    	case 'gestion_events_mail':
	    		$this->smarty->assign('gestionEventsMailEdit', null);
	    		
	    		$gestionEventsMail = $this->smarty->fetch('gestion_events_mail.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsMail);
	    	break;
	    	
	    	case 'gestion_events_mail_edit':
	    		$gestionEventsMailEdit = $this->smarty->fetch('gestion_events_mail_edit.tpl');
	    		$this->smarty->assign('gestionEventsMailEdit', $gestionEventsMailEdit);
	    	
	    		$gestionEventsMail = $this->smarty->fetch('gestion_events_mail.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsMail);
	    	break;
	    	
	    	case 'gestion_events_role':
				$this->smarty->assign('gestionEventsRoleInfos', null);
	    		
	    		$gestionEventsRole = $this->smarty->fetch('gestion_events_role.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsRole);
	    	break;
	    	case 'gestion_events_role_infos':
	    		$gestionEventsRoleInfos = $this->smarty->fetch('gestion_events_role_infos.tpl');
				$this->smarty->assign('gestionEventsRoleInfos', $gestionEventsRoleInfos);
				
				$gestionEventsRole = $this->smarty->fetch('gestion_events_role.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsRole);
	    	break;
	    	case 'gestion_events_role_new';
	    		$gestionEventsRoleInfos = $this->smarty->fetch('gestion_events_role_infos.tpl');
				$this->smarty->assign('gestionEventsRoleInfos', $gestionEventsRoleInfos);
				
				$gestionEventsRole = $this->smarty->fetch('gestion_events_role.tpl');
				$this->smarty->assign('gestionEventsContent', $gestionEventsRole);
	    	break;
    	}
		
	    return $this->smarty->fetch('gestion_events.tpl');
    }
    
    protected function drawGestionSpeakerInfos() {
	    $gestionEventsSpeakerInfos = $this->smarty->fetch('gestion_events_speaker_infos.tpl');
	    $this->smarty->assign('gestionEventsSpeakerInfos', $gestionEventsSpeakerInfos);
	    
	    return $this->smarty->fetch('gestion_events_single.tpl');
    }
    
    protected function drawGestionLocations($action) {
		switch ($action) {
			case 'gestion_locations_new':
			case 'gestion_locations_infos':
				$gestionLocationsInfos = $this->smarty->fetch('gestion_locations_infos.tpl');
			break;
			case 'gestion_locations_send':
				$this->displayMessage('This action is not yet implemented.');
				return null;
			break;
			default:
				$gestionLocationsInfos = null;
			break;
		}
		$gestionLocationsNav = $this->smarty->fetch('gestion_locations_nav.tpl');
		$this->smarty->assign('gestionLocationsNav', $gestionLocationsNav);
		
		$this->smarty->assign('gestionLocationsInfos', $gestionLocationsInfos);
		
		$gestionLocationsList = $this->smarty->fetch('gestion_locations_list.tpl');
		$this->smarty->assign('gestionLocationsList', $gestionLocationsList);

	    $this->smarty->assign('gestionLocationsInfos', $gestionLocationsInfos);
	    
	    return $this->smarty->fetch('gestion_locations.tpl');
    }
    
    
    protected function drawGestionLocationsInfos($action) {
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
     * Draw the Gestion Contacts page
     * @return content HTML of the Gestion Contacts page
     */
    protected function drawGestionContacts($action) {
    	$gestionContactsNav = $this->smarty->fetch('gestion_contacts_nav.tpl');
    	$this->smarty->assign('gestionContactsNav', $gestionContactsNav);
    	
    	switch($action) {
	    	case 'gestion_contacts':
	    		$gestionContactsList = $this->smarty->fetch('gestion_contacts_list.tpl');
				$this->smarty->assign('gestionContactsContent', $gestionContactsList);
	    	break;
			case 'gestion_contacts_infos':
				$gestionContactsInfos = $this->smarty->fetch('gestion_contacts_infos.tpl');
				$this->smarty->assign('gestionContactsContent', $gestionContactsInfos);
			break;
			case 'gestion_contacts_new':
				$gestionContactsNew = $this->smarty->fetch('gestion_contacts_new.tpl');
				$this->smarty->assign('gestionContactsContent', $gestionContactsNew);
			break;
			case 'gestion_contacts_role':
				$this->smarty->assign('gestionContactsRoleInfos', null);
			
				$gestionContactsRole = $this->smarty->fetch('gestion_contacts_role.tpl');
				$this->smarty->assign('gestionContactsContent', $gestionContactsRole);
			break;
			case 'gestion_contacts_role_infos': 
				$gestionContactsRoleInfos = $this->smarty->fetch('gestion_contacts_role_infos.tpl');
				$this->smarty->assign('gestionContactsRoleInfos', $gestionContactsRoleInfos);
				
				$gestionContactsRole = $this->smarty->fetch('gestion_contacts_role.tpl');
				$this->smarty->assign('gestionContactsContent', $gestionContactsRole);
			break;
			case 'gestion_contacts_role_new':
				$gestionContactsRoleInfos = $this->smarty->fetch('gestion_contacts_role_infos.tpl');
				$this->smarty->assign('gestionContactsRoleInfos', $gestionContactsRoleInfos);
				
				$gestionContactsRole = $this->smarty->fetch('gestion_contacts_role.tpl');
				$this->smarty->assign('gestionContactsContent', $gestionContactsRole);
			break;
			case 'new_contact_send':
				$this->displayMessage('This action is not yet implemented.');
				return null;
			break; 
			case 'gestion_contacts_role_send':
				$this->displayMessage('This action is not yet implemented.');
				return null;
			break;
    	}
    	
    	return $this->smarty->fetch('gestion_contacts.tpl');
    	
    }
    
    
    /**
     * Draw the Login page
     * @return content HTML of the Login page
     */
    protected function drawLogin($action) {
    	switch($action) {
	    	case 'login_send':
				$this->displayMessage('This action is not yet implemented.');
				return null;
			break;
			default:
    	}
    
    	// Assign variables
	    //$this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    $this->tedx_manager->login('admin','admin');
	    return $this->smarty->fetch('login.tpl');
    }
    
    
    /**
     * Draw the User Infos page
     * @return content HTML of the User Infos page
     */
    protected function drawUserInfos($action) {
    	switch($action) {
	    	case 'user_infos_send':
	    		$this->displayMessage('This action is not yet implemented.');
				return null;
	    	break;
			case 'user_infos_password':
				$this->displayMessage('This action is not yet implemented.');
				return null;
			break;
			default:
			
    	}
    
    	// Assign variables
	    //$this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    
	    return $this->smarty->fetch('user_infos.tpl');
    }
    
    
    /**
     * Draw the Register page
     * @return content HTML of the Register page
     */
    protected function drawRegister($action) {
    	switch($action) {
	    	case 'register_send':
	    		$this->displayMessage('This action is not yet implemented.');
				return null;
	    	break;
	    	default:
	    	
    	}
    
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
			
			// About
        	case 'about':
        		$topAction = 'about';
        		
        		try {
        			$subnav = $this->drawAboutNav();
		            $content = $this->drawAbout();
		        } catch (Exception $e) {
		            $this->displayMessage('The about page doesn\'t exist!');
		            $content = null;  
		            $subnav = null;      	
		        }
        		
			break;
			
			// Events
        	case 'events':
        		$topAction = 'events';
        		
        		try {
        			$subnav = null;
		            $content = $this->drawEvents();
		        } catch (Exception $e) {
		            $this->displayMessage('The events page doesn\'t exist!');
		            $content = null;
		            $subnav = null;          	
		        }
        		
			break;
			
			// Events registration
        	case 'events_registration':
        		$topAction = 'events';
        		
        		try {
        			$subnav = null;
		            $content = $this->drawEventsRegistration();
		        } catch (Exception $e) {
		            $this->displayMessage('The events registration doesn\'t exist!');
		            $content = null;   
		            $subnav = null;       	
		        }
        		
			break;	
			
			// Events participate
        	case 'events_participate':
        		$topAction = 'events';
        		
        		try {
        			$subnav = null;
		            $content = $this->drawEventsParticipate();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null; 
		            $subnav = null;         	
		        }
        		
			break;	
			
			// Videos
			case 'videos':
				$topAction = 'videos';
				
				try {
		            $subnav = $this->drawVideosNav();
					$content = $this->drawVideos();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;  
		            $subnav = null;         	
		        }
			break;
			
			// Videos Event
			case 'videos_event':
				$topAction = 'videos';
				
				try {
		            $subnav = $this->drawVideosNav();
					$content = $this->drawVideosEvent();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;  
		            $subnav = null;         	
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
		            $subnav = null;          	
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
		            $subnav = null;        	
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
		            $subnav = null;         	
		        }
			break;
			
			// contact Send
			case 'contact_send':
				$topAction = 'contact';
				
				try {
		            $subnav = null;
					$content = $this->drawContactReceived();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;   
		            $subnav = null;       	
		        }
			break;
			
			// Gestion
			case 'gestion':
				$topAction = 'gestion';
				$subAction = 'gestion';
				
				try {
		            $subnav = $this->drawGestionNav($subAction);
					$content = $this->drawGestion();
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;  
		            $subnav = null;         	
		        }
			break;
			
			// Gestion Events
			case 'gestion_events':
			case 'gestion_events_single':
			case 'add_slot':
			case 'add_speaker_to_slot':
			case 'add_organizer_to_event':
			case 'gestion_events_motivation':
			case 'motivation_refuse':
			case 'motivation_wait':
			case 'motivation_accept':
			case 'gestion_events_mail':
			case 'gestion_events_mail_edit':
			case 'mail_send':
			case 'gestion_events_role':
			case 'gestion_events_role_infos';
			case 'gestion_events_role_new';
			case 'gestion_events_role_send':
			case 'gestion_event_export':
			case 'gestion_events_send':
			case 'gestion_speaker_infos':
			case 'gestion_speaker_infos_send':
			
				$topAction = 'gestion';
				$subAction = 'gestion_events';
				
				try {
		            $subnav = $this->drawGestionNav($subAction);
					$content = $this->drawGestionEvents($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;   
		            $subnav = null;       	
		        }
			break;
			
			// Gestion Location
			case 'gestion_locations':
			case 'gestion_locations_new':
			case 'gestion_locations_send':
			case 'gestion_locations_infos':
			
				$topAction = 'gestion';
				$subAction = 'gestion_locations';
				
				try {
		            $subnav = $this->drawGestionNav($subAction);
					$content = $this->drawGestionLocations($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;  
		            $subnav = null;        	
		        }
			break;
			
			// Gestion Location
			case 'gestion_contacts':
			case 'gestion_contacts_infos':
			case 'gestion_contacts_new':
			case 'gestion_contacts_role':
			case 'gestion_contacts_role_infos': 
			case 'gestion_contacts_role_new':
			case 'gestion_contacts_role_send':
			case 'new_contact_send':
			
				$topAction = 'gestion';
				$subAction = 'gestion_contacts';
				
				try {
		            $subnav = $this->drawGestionNav($subAction);
					$content = $this->drawGestionContacts($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!'); 
		            $content = null;   
		            $subnav = null;       	
		        }
			break;
			
			// Login
			case 'login':
			case 'login_send':
				$topAction = 'login';
				//$this->tedx_manager->login('Penelope','anitakevinlove');
				
				try {
					$subnav = null;
					$content = $this->drawLogin($subAction);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');    
		            $content = null;    
		            $subnav = null;   	
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
		            $subnav = null;     	
		        }
				
				// Go to home page
				header("Location: ?action=home");
			break;
			
			// User infos
			case 'user_infos':
			case 'user_infos_send':
			case 'user_infos_password':
				$topAction = 'user_infos';
								
				try {
		            $subnav = null;
					$content = $this->drawUserInfos($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');
		            $content = null;  
		            $subnav = null;         	
		        }
			break;
			
			// Register
			case 'register':
			case 'register_send':
				$topAction = 'register';
								
				try {
		            $subnav = null;
					$content = $this->drawRegister($action);
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');   
		            $content = null;    
		            $subnav = null;    	
		        }
			break;
			
			// Default
			default:
        		$topAction = 'home';
        		
        		try {
        			$subnav = null;
		            $content = $this->drawHome();
		            $this->displayMessage('This action doesn\'t exist.');
		        } catch (Exception $e) {
		            $this->displayMessage('This page doesn\'t exist!');     
		            $content = null;    
		            $subnav = null;  	
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
        
        // Assigns the current action (for menu display) to Smarty      
        $this->smarty->assign('topAction', $topAction);
        
        // Assigns user information to Smarty
        $this->smarty->assign('userIsLogged', $this->tedx_manager->isLogged());
        $this->smarty->assign('username', $this->tedx_manager->getUsername());
        
        // Assigns the subnav to Smarty
        $this->smarty->assign('subnav', $subnav);
        
        // Assigns the content to Smarty
        $this->smarty->assign('content', $content);

        // Display IHM
        $this->smarty->display('main.tpl');
    }    
}

?>