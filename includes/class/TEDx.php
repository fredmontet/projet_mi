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
     * Create an array of Error Formular message
     * @return array of error message
     */
	protected function errorFormMessage() {
		return array(
				'firstname'		=>	'Please enter a first name',
				'username'		=>	'Please enter a name',
				'email'			=>	'Please enter a valid email address',
				'dateOfBirth'	=>	'Please enter a correct Birth date',
				'email'			=>	'Please enter a correct email',
				'phoneNumber'	=>	'Please enter a phone number',
				'country'		=>	'Please enter a Country',
				'address'		=>	'Please enter an address',
				'city'			=>	'Please enter a City',
				
		);
	}
	
	
	/**
     * Get the next event
     * @return object the next event
     */    
    protected function getNextEvent() {
    	
    	// Prepare the argument of the search
    	$searchArgs = array(
		    "where"      => "StartingDate >= NOW()",
		    "orderBy"    => "StartingDate",
		    "orderByType" => "ASC",
		);
		
		// Get all next Events
		$messageSearchEvents = $this->tedx_manager->searchEvents($searchArgs);
		
		// If Events are found, continue
		if($messageSearchEvents->getStatus()) {
		    $allValidSearchEvents = $messageSearchEvents->getContent();
		} else {
			// Else give the error message about no found Events
		    $this->displayMessage($messageSearchEvents->getMessage()); 
	    }
	    
	    // Get only the next Event
	    $aValidNextEvent = $allValidSearchEvents[0];
	    
	    // Return the next Event
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
		
		// Return the id from the _POST
		return $id;
    }
    
    
    /**
     * Check if the value have the correct type
     * @param $array with the type and the value
     * @return Boolean (1 if the value have the correct type)
     */   
    protected function validator($array) {
    
    	$type = $array[0];
    	$value = $array[1];
    
	    switch($type) {
	    
	    	// The type is a String
		    case 'String':
		    	$length = strlen($value);
		        $isString = is_string($value);
		        return $isString && $length > 0;
		    break;
		    
		    // The type is an Email
		    case 'Email':
		    	return preg_match('/^[\S]+@[\S]+\.\D{2,4}$/', $value);
		    break;
		    
		    // The type is a Date
		    case 'Date':
		    	$date = date_parse($value);
		    	return checkdate($date["month"], $date["day"], $date["year"]);
		    break;
		    
		    // The type is String and could be empty
		    case '0..1':
		        $isString = is_string($value);
		        return $isString;
		    break;
		    
	    }
    }
    
    
    /**
     * Valid values ​​received by _POST
     * @param Array _POST
     * @return Array two arrays
	 *			The first contains the values ​​transmitted by _POST
	 *			The second contains the state values ​​received by _POST
     */ 
    protected function gestionContactsInfosValidator($contact) {
		
		// Validate all received values 
        $errorState['name'] 		= $this->validator(array('String', $contact['name']));
        $errorState['firstname'] 	= $this->validator(array('String', $contact['firstname']));
        $errorState['dateOfBirth'] 	= $this->validator(array('Date', $contact['dateOfBirth']));
        $errorState['address'] 		= $this->validator(array('String', $contact['address']));
		$errorState['city'] 		= $this->validator(array('String', $contact['city']));
		$errorState['country']		= $this->validator(array('String', $contact['country']));
		$errorState['phoneNumber'] 	= $this->validator(array('String', $contact['phoneNumber']));
		$errorState['email'] 		= $this->validator(array('Email', $contact['email']));
		$errorState['description'] 	= $this->validator(array('0..1', $contact['description']));
		if(in_array("teamrole", $contact)) {
			$errorState['teamrole'] 	= $this->validator(array('0..1', $contact['teamrole']));
		}
        
        // Return two arrays
        return array($contact, $errorState);
    }
    
    
    /**
     * Valid values ​​received by _POST
     * @param Array _POST
     * @return Array two arrays
	 *			The first contains the values ​​transmitted by _POST
	 *			The second contains the state values ​​received by _POST
     */ 
    protected function gestionContactsRoleInfosValidator($role) {
		
		// Validate all received values 
        $errorState['teamrole'] 		= $this->validator(array('String', $role['teamrole']));
        
        // Return two arrays
        return array($role, $errorState);
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
    	
    	// Get all Events
    	$messageEvents = $this->tedx_manager->getEvents();
    	
    	// If Events are found, continue
    	if($messageEvents->getStatus()) {
		    $allValidEvents = $messageEvents->getContent();
		} else {
			// Else give the error message about no found Events
		    $this->displayMessage($messageEvents->getMessage()); 
	    }
		
		// For each Event
		foreach ($allValidEvents as $aValidEvent) {
			$events[] = $this->drawEventsSingle($aValidEvent->getNo());
		}
		
		// Get the content of the Events navigator
		$events_nav = $this->smarty->fetch('events_nav.tpl');
		
		// Assigns variables to Smarty
		$this->smarty->assign('events', $events);
		$this->smarty->assign('events_nav', $events_nav);
		
		// Return the content of Events page
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
     * Draw the Events Registration page
     * @return content HTML of the Events Registration page
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
     * Draw the Contact Received page
     * @return content HTML of the Contact Received page
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
     * Draw the Gestion Events page
     * @return content HTML of the Gestion Events page
     */
    protected function drawGestionEvents($action) {
    	
    	// Get the navigator of Gestion Events
    	$gestionEventsNav = $this->smarty->fetch('gestion_events_nav.tpl');
    	
    	// Assigns the navigator of Gestion Events to Smarty
    	$this->smarty->assign('gestionEventsNav', $gestionEventsNav);
    	
    	// Choose the good action
    	switch($action) {
    		
    		// Add a Slot to an Event
    		case 'add_slot':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Add a Speaker to a Slot
    		case 'add_speaker_to_slot':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Save an Event
    		case 'gestion_events_send':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Add an Organizer to an Event
    		case 'add_organizer_to_event':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Export the list of all Person concerned by the Event
    		case 'gestion_event_export':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Refused a Motivation
    		case 'motivation_refuse':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Set the status Wait for a Motivation
			case 'motivation_wait':
				$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Accept a Motivation
			case 'motivation_accept':
				$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Send a Mail
    		case 'mail_send':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Save a Role for an Event
    		case 'gestion_events_role_send':
    			$this->displayMessage('This action is not yet implemented.');
				$content = null;
    		break;
    		
    		
    		// Gestion Events List
	    	case 'gestion_events':
	    	case 'gestion_events_list':
	    	
	    		// Get all Events
	    		$messageEvents = $this->tedx_manager->getEvents();
				
				// If Events are found, continue
		    	if($messageEvents->getStatus()) {
				    $allValidEvents = $messageEvents->getContent();
				} else {
					// Else give the error message about no found Events
				    $this->displayMessage($messageEvents->getMessage()); 
			    }
				
				// Assigns variables to Smarty
				$this->smarty->assign('events', $allValidEvents);
				
				// Get the content of Gestion Events List
	    		$content = $this->smarty->fetch('gestion_events_list.tpl');
	    	break;
	    	
	    	
	    	// Gestion Events
	    	case 'gestion_events_single':
	    	case 'gestion_speaker_infos':
	    	case 'gestion_speaker_infos_send':
	    		
	    		switch($action) {
	    		
	    			// Gestion Speaker Infos
		    		case 'gestion_speaker_infos':
		    			$gestionEventsSpeakerInfos = $this->smarty->fetch('gestion_events_speaker_infos.tpl');
					    $this->smarty->assign('gestionEventsSpeakerInfos', $gestionEventsSpeakerInfos);
		    		break;
		    		
		    		// Edit the infos of Speaker
		    		case 'gestion_speaker_infos_send':
		    			$this->displayMessage('This action is not yet implemented.');
						$content = null;
						$this->smarty->assign('gestionEventsSpeakerInfos', null);
		    		break;
		    		
		    		default:
		    			$this->smarty->assign('gestionEventsSpeakerInfos', null);
		    		break;
	    		}
	    	
	    		$id = $this->getId();
	    		
	    		// If there is an id received, continue
	    		if($id != null) {
	    			// Get the content of Gestion Events Single
		    		$content = $this->drawGestionEventsSingle($id);
					
	    		} else {
	    			// Else give an error message about no event with this id
		    		$this->displayMessage('There isn\'t an event with this id.');
	    		}
	    	break;
	    	
	    	
			// Gestion Events Motivations
	    	case 'gestion_events_motivation':
	    		// Get the content of Gestion Events Motivation
	    		$content = $this->drawGestionEventsMotivation($action);
	    	break;
	    	
	    	
	    	// Gestion Events mail
	    	case 'gestion_events_mail':
	    	case 'gestion_events_mail_edit':	    		
	    		// Get the content of Gestion Events Mail
	    		$content = $this->drawGestionEventsMail($action);
	    	break;
	    	
	    	
	    	// Gestion Events Role
	    	case 'gestion_events_role':
	    	case 'gestion_events_role_infos':
	    		// Get the content of Gestion Events Role
	    		$content = $this->drawGestionEventsRole($action);
	    	break;
	    	
	    	
	    	// Gestion Events Role New
	    	case 'gestion_events_role_new';
	    		$gestionEventsRoleInfos = $this->smarty->fetch('gestion_events_role_infos.tpl');
				$this->smarty->assign('gestionEventsRoleInfos', $gestionEventsRoleInfos);
				
				// Get the content of Gestion Events Role
				$content = $this->smarty->fetch('gestion_events_role.tpl');
	    	break;
    	}
    	
    	// Assigns the content of Gestion Events Motivation to Smarty
		$this->smarty->assign('gestionEventsContent', $content);
		
		// Return the content of Gestion Events
	    return $this->smarty->fetch('gestion_events.tpl');
    }
  
  
	/**
     * Draw the Gestion Events Single page
     * @return content HTML of the Gestion Events Single page
     */
    protected function drawGestionEventsSingle($id) {
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
	    
	    return $this->smarty->fetch('gestion_events_single.tpl');

    }
    
    
    /**
     * Draw the Gestion Events Motivations page
     * @return content HTML of the Gestion Events Motivations page
     */
    protected function drawGestionEventsMotivation($action) {
    
	    // Get Next Event
		$aValidNextEvent = $this->getNextEvent();
		
		// Get Registrations for an Event
		$messageRegistrations = $this->tedx_manager->getRegistrationsByEvent($aValidNextEvent);
		
		// If Registrations are found, continue
		if($messageRegistrations->getStatus()) {
    		$allValidRegistrations = $messageRegistrations->getContent();
    		
    		// for each Registrations
    		foreach($allValidRegistrations as $key=>$aValidRegistration) {
    		
    			$registrations[]['registration'] = $aValidRegistration;
    		
	    		// Get registered Person of an Event
	    		$messagePerson = $this->tedx_manager->getPerson($aValidRegistration->getParticipantPersonNo());
	    		
	    		// If Person is found, continue
	    		if($messagePerson->getStatus()) {
		    		$aValidPerson = $messagePerson->getContent();
		    		
		    		// Prepare an array for Smarty [Registration]
					$registrations[$key]['person'] = $aValidPerson;
					
					// Get Participant
					$messageParticipant = $this->tedx_manager->getParticipant($aValidPerson->getNo());
					
					// If Participant is found, continue
					if($messageParticipant->getStatus()) {
						$aValidParticipant = $messageParticipant->getContent();
						
						// Get Motivations by a Participant concerning an Event
						$args = array(
								'participant' => $aValidParticipant,
								'event' => $aValidNextEvent
								);
						$messageMotivations = $this->tedx_manager->getMotivationsByParticipantForEvent($args);
						
						// If Motivations are found, continue
						if($messageMotivations->getStatus()) {
							$allValidMotivations = $messageMotivations->getContent();
							
							// Prepare an array for Smarty [Registrations]
							$registrations[$key]['motivations'] = $allValidMotivations;
							
						} else {
							$registrations[$key]['motivations'] = null;
						}
						
					} else {
						// Else give the error message about no Participant found
						$this->displayMessage($messageParticipant->getMessage());
						$registrations[$key]['person'] = null;
					}

	    		} else {
	    			// Else give the error message about no Person found
		    		$this->displayMessage($messagePerson->getMessage());
		    		$registrations[]['registration'] = null;
	    		}
    		}
    		
    		
		} else {
			// Else give the error message about no found registration
    		$this->displayMessage($messageRegistrations->getMessage());
    		$allValidRegistrations = null;
		}
		// Assigns variables to Smarty
		$this->smarty->assign('registrations', $registrations);
		
		// Return the content of Gestion Events Motivation
		return $this->smarty->fetch('gestion_events_motivation.tpl');
    }
    
    
    /**
     * Draw the Gestion Events Mail page
     * @return content HTML of the Gestion Events Mail page
     */
    protected function drawGestionEventsMail($action) {
    
    	// Get Next Event
		$aValidNextEvent = $this->getNextEvent();
		
		// Get Registrations for an Event
		$messageRegistrations = $this->tedx_manager->getRegistrationsByEvent($aValidNextEvent);
		
		// If Registrations are found, continue
		if($messageRegistrations->getStatus()) {
    		$allValidRegistrations = $messageRegistrations->getContent();
    		
    		// for each Registrations
    		foreach($allValidRegistrations as $key=>$aValidRegistration) {
    		
    			$registrations[]['registration'] = $aValidRegistration;
    		
	    		// Get registered Person of an Event
	    		$messagePerson = $this->tedx_manager->getPerson($aValidRegistration->getParticipantPersonNo());
	    		
	    		// If Person is found, continue
	    		if($messagePerson->getStatus()) {
		    		$aValidPerson = $messagePerson->getContent();
		    		
		    		// Prepare an array for Smarty [Registration]
					$registrations[$key]['person'] = $aValidPerson;

	    		} else {
	    			// Else give the error message about no Person found
		    		$this->displayMessage($messagePerson->getMessage());
		    		$registrations[]['registration'] = null;
	    		}
    		}
    		
    		
		} else {
			// Else give the error message about no found registration
    		$this->displayMessage($messageRegistrations->getMessage());
    		$allValidRegistrations = null;
		}
		// Assigns variables to Smarty
		$this->smarty->assign('registrations', $registrations);
		
		// If there is a Person selected, continue
    	if($action == 'gestion_events_mail_edit') {
    	
    		// Get the content of Gestion Events Mail Edit
			$gestionEventsMailEdit = $this->smarty->fetch('gestion_events_mail_edit.tpl');
			$this->smarty->assign('gestionEventsMailEdit', $gestionEventsMailEdit);
			
		} else {
			// Else put the variables at null
			$this->smarty->assign('gestionEventsMailEdit', null);
		}
    	
    	// Return the content of Gestion Events Mail
	    return $this->smarty->fetch('gestion_events_mail.tpl');
    }
    
    /**
     * Draw the Gestion Events Role page
     * @return content HTML of the Gestion Events Role page
     */
	 protected function drawGestionEventsRole($action) {
     	
     	// Get all Events
     	$messageEvents = $this->tedx_manager->getEvents();
    	
    	// If there is an Event, continue
    	if($messageEvents->getStatus()) {
		    $allValidEvents = $messageEvents->getContent();
		    
		    // For each Event
		    foreach ($allValidEvents as $key=>$aValidEvent) {
		    
		    	$events[]['event'] = $aValidEvent;
		    
		    	// Get Roles in an Event
			    $messageRoles = $this->tedx_manager->getRolesByEvent($aValidEvent);
			    
			    // If Roles are found, continue
			    if($messageRoles->getStatus()) {
				    $aValidRoles = $messageRoles->getContent();
				    
				    $events[$key]['roles'] = $aValidRoles;
				    
			    } else {
				    $events[$key]['roles'] = null;
			    }
		    }
		    		    
		} else {
			// Else give the error message about no Event found
		    $this->displayMessage($messageEvents->getMessage()); 
		    $events[]['event'] = null;
	    }
	
     	// If there is a Role selected, continue
	    if ($action == 'gestion_events_role_infos') {
	    	
	    	// Recover the Role required
	    	if (isset($_REQUEST['name'])) {
			    $name = $_REQUEST['name'];
			} else {
			    $name = null;
			}
			
			if (isset($_REQUEST['event'])) {
			    $eventNo = $_REQUEST['event'];
			} else {
			    $eventNo = null;
			}
			
			if (isset($_REQUEST['organizer'])) {
			    $organizerPersonNo = $_REQUEST['organizer'];
			} else {
			    $organizerPersonNo = null;
			}
	    	
	    	if($name !=null && $eventNo != null && $organizerPersonNo != null) {
		    	// Get the Role
		    	$args = array(
		    			'name'		=>	$name,
		    			'event'		=>	$eventNo,
		    			'organizer'	=>	$organizerPersonNo
		    	);
		    	$messageRole = $this->tedx_manager->getRole($args);
		    	
		    	// If the Role is found, continue
		    	if($messageRole->getStatus()) {
			    	$aValidRole = $messageRole->getContent();
			    	
			    	// Assigns variable to Smarty
			    	$this->smarty->assign('role', $aValidRole);
			    	
		    	} else {
			    	// Else give the error message about no Role found
			    	$this->displayMessage($messageRole->getMessage());
		    	}
		    
		    	// Get the content of Events Role Infos
			    $gestionEventsRoleInfos = $this->smarty->fetch('gestion_events_role_infos.tpl');
				$this->smarty->assign('gestionEventsRoleInfos', $gestionEventsRoleInfos);
				
		    } else {
			    $this->displayMessage("There is no Role with this ID");
		    }

		} else {
		     // Else put the variables at null
			$this->smarty->assign('gestionEventsRoleInfos', null);
		}
		
		// Assigns variables to Smarty
		$this->smarty->assign('events', $events);
		$this->smarty->assign('gestionEventsRoleInfos', $gestionEventsRoleInfos);
		
		// Get the content of Gestion Events Role
		return $this->smarty->fetch('gestion_events_role.tpl');

     }
    
    
	/**
	 * Draw the Gestion Events Speaker Infos
	 * @return content HTML of the Gestion Events Speaker Infos
	 */
    protected function drawGestionSpeakerInfos() {
	    $gestionEventsSpeakerInfos = $this->smarty->fetch('gestion_events_speaker_infos.tpl');
	    $this->smarty->assign('gestionEventsSpeakerInfos', $gestionEventsSpeakerInfos);
	    
	    return $this->smarty->fetch('gestion_events_single.tpl');
    }
    
    
    /**
     * Draw the Gestion Locations page
     * @return content HTML of the Gestion Locations page
     */
    protected function drawGestionLocations($action) {
    
    	$gestionLocationsNav = $this->smarty->fetch('gestion_locations_nav.tpl');
		$this->smarty->assign('gestionLocationsNav', $gestionLocationsNav);
    
    	switch ($action) {
    		
    		// Gestion Locations New
	    	case 'gestion_locations_new':
	    		
	    		// Assigns variables to Smarty
				$this->smarty->assign('location', null);
				
	    		$gestionLocationsInfos = $this->smarty->fetch('gestion_locations_infos.tpl');
	    	break;
	    	
	    	
	    	// Gestion Locations Infos
			case 'gestion_locations_infos':

		    	$id = $this->getId();

		    	if(isset($_POST['update'])) {
			    	
			    	list($locations, $errorState) = $this->gestionLocationsValidator($_POST);
			    	
			    	// If all values are correct, continue
			    	if(count(array_keys($errorState, true)) == count($errorState)) {
			    	
			    		// Prepare the array to edit the Contact
				    	$args = array(
						    'Name' => $locations['Name'], // String
						    'Address' => $locations['Address'], // String
						    'City' => $locations['City'], // Date
						    'Country' => $locations['Country'], // String
						    'Direction' => $locations['Direction'], // String Optional
						);
						
			    	} else {
				    	
			    	}
			    	
		    	} else {
			    	$errorState = null;
		    	}
				
				// Get the Location concerned
				$messageLocation = $this->tedx_manager->getLocation($id);
				
				// If the Location is found, continue
				if($messageLocation->getStatus()) {
					$aValidLocation = $messageLocation->getContent();
				} else {
					// Else give the error about no found Location
					$this->displayMessage($messageLocation->getMessage());
				}
				
				// Assigns variables to Smarty
				$this->smarty->assign('location', $aValidLocation);
			
				$gestionLocationsInfos = $this->smarty->fetch('gestion_locations_infos.tpl');
	    	break;
	    	
	    	
	    	// Gestion Locations Send
			case 'gestion_locations_send':
				$this->displayMessage('This action is not yet implemented.');
				return null;
	    	break;
	    	
	    	
	    	// Gestion Locations
	    	case 'gestion_locations':
			default:
				$gestionLocationsInfos = null;
	    	break;
    	}
    	
    	// Get Locations
		$messageLocations = $this->tedx_manager->getLocations();
		
		// If Locations are found, continue
		if($messageLocations->getStatus()) {
			$allValidLocations = $messageLocations->getContent();
		} else {
			$this->displayMessage($messageLocations->getMessage());
		}
		
		// Assigns variables to Smarty
		$this->smarty->assign('locations', $allValidLocations);
		$this->smarty->assign('gestionLocationsInfos', $gestionLocationsInfos);
		
		// Get the content of the Locations list 
		$gestionLocationsList = $this->smarty->fetch('gestion_locations_list.tpl');
		
		// Assigns variables to Smarty
		$this->smarty->assign('gestionLocationsList', $gestionLocationsList);
	    
	    // Return the conent of Gestion Locations
	    return $this->smarty->fetch('gestion_locations.tpl');
    }
    
    
     /**
     * Draw the Gestion Contacts page
     * @return content HTML of the Gestion Contacts page
     */
    protected function drawGestionContacts($action) {
    
    	// Get the content of the Contacts navigator
    	$gestionContactsNav = $this->smarty->fetch('gestion_contacts_nav.tpl');
    	
    	// Assigns the Contacts navigator to Smarty
    	$this->smarty->assign('gestionContactsNav', $gestionContactsNav);
    	
    	// Choose the good action
    	switch($action) {
    	
    		// Gestion Contacts
	    	case 'gestion_contacts':
	    	
	    		// Get the content of Gestion Contacts
	    		$content = $this->drawGestionContactsList();
	    	break;
	    	
	    	// Gestion Contacts Infos
			case 'gestion_contacts_infos':
				
				// Get the content of Gestion Contacts Infos
	    		$content = $this->drawGestionContactsInfos();
			break;
			
			
			// Gestion Contacts New
			case 'gestion_contacts_new':
			
				// Get the content of Gestion Contacts New
	    		$content = $this->drawGestionContactsNew();
			break;
			
			// Gestion Contacts Role
			case 'gestion_contacts_role':
								
				// Get the content of Gestion Contacts Role
	    		$content = $this->drawGestionContactsRole();
			break;
			
			// Gestion Contacts Role Infos
			case 'gestion_contacts_role_infos': 
				
				// Get the content of Gestion Contacts Role Infos
	    		$content = $this->drawGestionContactsRoleInfos();
			break;
			
			// Gestion Contacts Role New
			case 'gestion_contacts_role_new':
								
				// Get the content of Gestion Contacts Role New
	    		$content = $this->drawGestionContactsRoleNew();
			break;
			
			// Create a new Role of Contact
			case 'gestion_contacts_role_send':
				$this->displayMessage('This action is not yet implemented.');
				return null;
			break;
    	}
    	
    	// Assigns the content of Gestion Contacts to Smarty
    	$this->smarty->assign('gestionContactsContent', $content);
    	
    	return $this->smarty->fetch('gestion_contacts.tpl');
    	
    }
    
    
    /**
     * Draw the Gestion Contacts List
     * @return content HTML of the Gestion Contacts List
     */
    protected function drawGestionContactsList() {
	    
	    // Get all Persons
	    $messagePersons = $this->tedx_manager->getPersons();
	    
	    // If Persons are found, continue
	    if($messagePersons->getStatus()) {
		    $allValidPersons = $messagePersons->getContent();
		    
		    // For each Person
		    foreach($allValidPersons as $key=>$aValidPerson) {
		    
		    	$contacts[]['person'] = $aValidPerson;
			    
			    // Get the Organizer with the same ID
			    $messageOrganizer = $this->tedx_manager->getOrganizer($aValidPerson->getNo());
			    
			    // Get the function of the Person
			    $aValidPersonIsOrganizer = $messageOrganizer->getStatus();
			    
			    $contacts[$key]['organizer'] = $aValidPersonIsOrganizer;
			    
			    // Get the Speaker with the same ID
			    $messageSpeaker = $this->tedx_manager->getSpeaker($aValidPerson->getNo());
			    
			    // Get the function of the Person
			    $aValidPersonIsSpeaker = $messageSpeaker->getStatus();
			    
			    $contacts[$key]['speaker'] = $aValidPersonIsSpeaker;
			    
			    // Get the Participant with the same ID
			    $messageParticipant = $this->tedx_manager->getParticipant($aValidPerson->getNo());
			    
			    // Get the function of the Person
			    $aValidPersonIsParticipant = $messageParticipant->getStatus();
			    
			    $contacts[$key]['participant'] = $aValidPersonIsParticipant;
		    }
		    
	    } else {
		    // Else give the error message about no found Person
		    $this->displayMessage($messagePersons->getMessage());
	    }
	    
	    // Assigns variables to Smarty
	    $this->smarty->assign('contacts', $contacts);
	    
	    return $this->smarty->fetch('gestion_contacts_list.tpl');
    }
    
    
     /**
     * Draw the Gestion Contacts Infos
     * @return content HTML of the Gestion Contacts Infos
     */
    protected function drawGestionContactsInfos() {
    
    	// If the user want to edit the contact, continue
    	
    	$id = $this->getId();
    	
    	if(isset($_POST['update'])) {
	    	
	    	list($contact, $errorState) = $this->gestionContactsInfosValidator($_POST);
	    	
	    	// If all values are correct, continue
	    	if(count(array_keys($errorState, true)) == count($errorState)) {
	    	
	    		// Prepare the array to edit the Contact
		    	$args = array(
				    'no' => $id, // int
				    'name' => $contact['name'], // String
				    'firstName' => $contact['firstname'], // String
				    'dateOfBirth' => $contact['dateOfBirth'], // Date
				    'address' => $contact['address'], // String
				    'city' => $contact['city'], // String
				    'country' => $contact['country'], // String
				    'phoneNumber' => $contact['phoneNumber'], // string
				    'email' => $contact['email'], // String
				    'description' => $contact['description'], // String
				);
				
				// Edit the contact's infos
				$aChangedProfil= $this->tedx_manager->changeProfil($args);
				
				// If the Contact is changed, continue
				if($aChangedProfil->getStatus()) {
					
					// Get Organizer
			    	$messageOrganizer = $this->tedx_manager->getOrganizer($id);
			    	
			    	// If the Organizer is found, continue
			    	if($messageOrganizer->getStatus()) {
				    	$aValidOrganizer = $messageOrganizer->getContent();
				    	
				    	// Get TeamRole
				    	$messageTeamRole = $this->tedx_manager->getTeamRole($contact['teamrole']);
				    	
				    	// If the TeamRole is found, continue
				    	if($messageTeamRole->getStatus()) {
					    	$aValidTeamRole = $messageTeamRole->getContent();
					    	
					    	$args = array(
								'organizer'		=> $aValidOrganizer, // An Object Organizer
								'teamRole'		=> $aValidTeamRole // An object Team Role
							);
							
							$anAffectation = $this->tedx_manager->affectTeamRole($args);
							
							if( $anAffectation->getStatus()) {
								
							} else {
								$this->displayMessage($anAffectation->getMessage());
							}
					    	
				    	} else {
					    	// Else give the error message about no found TeamRole
					    	$this->displayMessage($messageTeamRole->getMessage());
				    	}
				    	
				    } else {
					    
					    // Get Person
					    $messagePerson = $this->tedx_manager->getPerson($id);
					    
					    // If the Person is found, continue
					    if($messagePerson->getStatus()) {
						    $aValidPerson = $messagePerson->getContent();
						    
						    // Set the Person to Organizer
						    $messageSetPersonAsOrganizer = $this->tedx_manager->setPersonAsOrganizer($aValidPerson);
						    
						    // If the Organizer is created
						    if($messageSetPersonAsOrganizer->getStatus()) {
							   
							   // Get TeamRole
						    	$messageTeamRole = $this->tedx_manager->getTeamRole($contact['teamrole']);
						    	
						    	// If the TeamRole is found, continue
						    	if($messageTeamRole->getStatus()) {
							    	$aValidTeamRole = $messageTeamRole->getContent();
							    	
							    	$args = array(
										'organizer'		=> $aValidOrganizer, // An Object Organizer
										'teamRole'		=> $aValidTeamRole // An object Team Role
									);
									
									$anAffectation = $this->tedx_manager->affectTeamRole($args);
									
									if( $anAffectation->getStatus()) {
										
									} else {
										$this->displayMessage($anAffectation->getMessage());
									}
							    	
						    	} else {
							    	// Else give the error message about no found TeamRole
							    	$this->displayMessage($messageTeamRole->getMessage());
						    	}

						    } else {
							    
						    }
						    
					    } else {
						    // Else give the error message about no found Person
						    $this->displayMessage($messagePerson->getMessage());
					    }
				    }
					
				} else {
					$this->displayMessage($aChangedProfil->getMessage());
				}
				
	    	} else {
		    	
	    	}
	    	
    	} else {
	    	$errorState = null;
    	}
    	
    	// Get Person
    	$messagePerson = $this->tedx_manager->getPerson($id);
    	
    	// If the Person is found, continue
    	if($messagePerson->getMessage()) {
	    	$aValidPerson = $messagePerson->getContent();
	    	
	    	// Get Participant
	    	$messageParticipant = $this->tedx_manager->getParticipant($id);
	    	
	    	// If the Participant is found, continue
	    	if($messageParticipant->getStatus()) {
		    	$aValidParticipant = $messageParticipant->getContent();
		    	
		    	// Get Registrations by the Person
		    	$messageRegistrations = $this->tedx_manager->getRegistrationsByParticipant($aValidParticipant);
		    	
		    	// If Registrations are found, continue
		    	if($messageRegistrations->getStatus()) {
			    	$allValidRegistrations = $messageRegistrations->getContent();
			    	
			    	// For each Registration
			    	foreach($allValidRegistrations as $key=>$aValidRegistration) {
				    	
				    	$registrations[]['registrations'] = $aValidRegistration;
				    	
				    	// Get Event
				    	$messageEvent = $this->tedx_manager->getEvent($aValidRegistration->getEventNo());
				    	
				    	// If the Event is found
				    	if($messageEvent->getStatus()) {
					    	$aValidEvent = $messageEvent->getContent();
					    	
					    	$registrations[$key]['event'] = $aValidEvent;
					    	
					    	
				    	} else {
					    	// Else give the error message about no found Event
					    	$this->displayMessage($messageEvent->getMessage());
					    	
				    	}
			    	}
			    	
		    	} else {
		    		// Else give the error about no found Registration
		    		//$this->displayMessage($messageRegistrations->getMessage());
		    		$registrations[]['registrations'] = null;
		    	}
	    	} else {
	    		$registrations = null;
	    	}	   
	    	
	    	// Get Speaker
	    	$messageSpeaker = $this->tedx_manager->getSpeaker($id);
	    	
	    	// If the Speaker is found, continue
	    	if($messageSpeaker->getStatus()) {
		    	$aValidSpeaker = $messageSpeaker->getContent();
		    	
		    	
	    	} else {
		    	
	    	}
	    	
	    	// Get Organizer
	    	$messageOrganizer = $this->tedx_manager->getOrganizer($id);
	    	
	    	// If the Organizer is found, continue
	    	if($messageOrganizer->getStatus()) {
		    	$aValidOrganizer = $messageOrganizer->getContent();
		    	
		    	// Get Roles
		    	$messageRoles = $this->tedx_manager->getRolesByOrganizer($aValidOrganizer);
		    	
		    	// If Roles are found, continue
		    	if($messageRoles->getStatus()) {
			    	$allValidRoles = $messageRoles->getContent();
			    	
		    	} else {
			    	$allValidRoles = null;
		    	}
		    	
		    	// Get TeamRole
		    	$messageTeamRole = $this->tedx_manager->getTeamRolesByOrganizer($aValidOrganizer);
		    	
		    	// If the TeamRole is found, continue
		    	if($messageTeamRole) {
			    	$aValidTeamRole = $messageTeamRole->getContent();
			    	
		    	} else {
			    	$aValidTeamRole = null;
		    	}
		    	
	    	} else {
		    	$allValidRoles = null;
		    	$aValidTeamRole = null;
	    	}
	    	
	    	// Get TeamRoles
	    	$messageTeamRoles = $this->tedx_manager->getTeamRoles();
	    	
	    	// If TeamRoles are found, continue
	    	if($messageTeamRoles->getStatus()) {
		    	$allValidTeamRoles = $messageTeamRoles->getContent();
	    	} else {
		    	$allValidTeamRoles = null;
	    	}
	    	
	    	// Get Speaker
	    	$messageSpeaker = $this->tedx_manager->getSpeaker($id);
	    	
	    	// If the Speaker is found, continue
	    	if($messageSpeaker->getStatus()) {
		    	$aValidSpeaker = $messageSpeaker->getContent();
		    	
		    	// Get all Talks where the Speaker has co-organize
		    	$messageTalks = $this->tedx_manager->getTalksBySpeaker($aValidSpeaker);
		    	
		    	// If Talks are found, continue
		    	if($messageTalks->getStatus()) {
			    	$allValidTalks = $messageTalks->getContent();
			    	
			    	// For each Talk
			    	foreach($allValidTalks as $key=>$aValidTalk) {
			    	
			    		$talks[]['talk'] = $aValidTalk;
				    	
				    	// Get Event
				    	$messageEvent = $this->tedx_manager->getEvent($aValidTalk->getEventNo());
				    	
				    	// If the Event is found
				    	if($messageEvent->getStatus()) {
					    	$aValidEvent = $messageEvent->getContent();
					    	
					    	$talks[$key]['event'] = $aValidEvent;
					    	
				    	} else {
					    	// Else give the error message about no found Event
					    	$this->displayMessage($messageEvent->getMessage());
					    	
				    	}
			    	}
			    	
		    	} else {
			    	$talks = null;
		    	}
		    	
	    	} else {
		    	$talks = null;
	    	}
	    	
	    	
	    	
    	} else {
	    	// Else give the erro message about no found Person
			$this->displayMessage($messagePerson->getMessage());
			$registrations=null;
    	}
    	
    	$errorFormMessage = $this->errorFormMessage();
    	
    	// Assigns variables to Smarty
    	$this->smarty->assign('talks', $talks);
    	$this->smarty->assign('teamRoles', $allValidTeamRoles);
    	$this->smarty->assign('isTeamRole', $aValidTeamRole);
    	$this->smarty->assign('roles', $allValidRoles);
    	$this->smarty->assign('registrations', $registrations);
    	$this->smarty->assign('errorState', $errorState);
    	$this->smarty->assign('errorFormMessage', $errorFormMessage);
    	$this->smarty->assign('person', $aValidPerson);
    
	    return $this->smarty->fetch('gestion_contacts_infos.tpl');
    }
    
    /**
     * Draw the Gestion Contacts New page
     * @return content HTML of the Gestion Contacts New page
     */
    protected function drawGestionContactsNew() {
    
    	if(isset($_POST['update'])) {
	    	
	    	list($contact, $errorState) = $this->gestionContactsInfosValidator($_POST);
	    	
	    	// If all values are correct, continue
	    	if(count(array_keys($errorState, true)) == count($errorState)) {
	    	
	    		// Prepare the array to edit the Contact
		    	$args = array(
				    'name' => $contact['name'], // String
				    'firstName' => $contact['firstname'], // String
				    'dateOfBirth' => $contact['dateOfBirth'], // Date
				    'address' => $contact['address'], // String
				    'city' => $contact['city'], // String
				    'country' => $contact['country'], // String
				    'phoneNumber' => $contact['phoneNumber'], // string
				    'email' => $contact['email'], // String
				    'description' => $contact['description'], // String
				    'idmember'    => $contact['email'], // String
				    'password'    => 'test' // String encrypt to MD5
				);
				
				// Edit the contact's infos
				$messageRegisteredVisitor = $this->tedx_manager->registerVisitor($args);
				
				// If the Contact is changed, continue
				if($messageRegisteredVisitor->getStatus()) {
					echo "<h1>Contact added</h1>";
				} else {
					$this->displayMessage($messageRegisteredVisitor->getMessage());
				}
				
	    	} else {
		    	
	    	}
	    	
    	} else {
	    	$errorState = null;
    	}

    	
    	// Get TeamRole
    	$messageTeamRoles = $this->tedx_manager->getTeamRoles();
    	
    	// If TeamRole are found, continue
    	if($messageTeamRoles->getStatus()) {
	    	$allValidTeamRoles = $messageTeamRoles->getContent();
    	} else {
	    	$allValidTeamRoles = null;
    	}
    	
    	$errorFormMessage = $this->errorFormMessage();
    	
    	// Assigns variables to Smarty
    	$this->smarty->assign('errorState', $errorState);
    	$this->smarty->assign('errorFormMessage', $errorFormMessage);
    	$this->smarty->assign('teamRoles', $allValidTeamRoles);
    	
	    return $this->smarty->fetch('gestion_contacts_new.tpl');
    }
    
    
    /**
     * Draw the Gestion Contacts Role Infos
     * @return content HTML of the Gestion Contacts Role Infos
     */
    protected function drawGestionContactsRole() {
    
    	// Get TeamRole
    	$messageTeamRoles = $this->tedx_manager->getTeamRoles();
    	
    	// If TeamRole are found, continue
    	if($messageTeamRoles->getStatus()) {
	    	$allValidTeamRoles = $messageTeamRoles->getContent();
    	} else {
	    	$allValidTeamRoles = null;
    	}
    	
    	$errorFormMessage = $this->errorFormMessage();
    	
    	// Assigns variables to Smarty
    	//$this->smarty->assign('errorState', $errorState);
    	$this->smarty->assign('errorFormMessage', $errorFormMessage);
    	$this->smarty->assign('teamRoles', $allValidTeamRoles);
    
	    $this->smarty->assign('gestionContactsRoleInfos', null);
		
		return $this->smarty->fetch('gestion_contacts_role.tpl');
    }
    
    
    /**
     * Draw the Gestion Contacts Role Infos
     * @return content HTML of the Gestion Contacts Role Infos
     */
    protected function drawGestionContactsRoleInfos() {
    
    	$id = $this->getId();
    	
    	if(isset($_POST['update'])) {
	    	
	    	list($role, $errorState) = $this->gestionContactsRoleInfosValidator($_POST);
	    	
	    	// If all values are correct, continue
	    	if(count(array_keys($errorState, true)) == count($errorState)) {
	    	
	    	} else {
		    	
	    	}
	    } else {
		    
	    }
    
    
    	// Get TeamRoles
    	$messageTeamRoles = $this->tedx_manager->getTeamRoles();
    	
    	// If TeamRole are found, continue
    	if($messageTeamRoles->getStatus()) {
	    	$allValidTeamRoles = $messageTeamRoles->getContent();
    	} else {
	    	$allValidTeamRoles = null;
    	}
    	
    	// Get TeamRole
		$messageTeamRole = $this->tedx_manager->getTeamRole($id);
		
		// If the TeamRole is found, continue
		if($messageTeamRole->getStatus()) {
	    	$aValidTeamRole = $messageTeamRole->getContent();
	    } else {
		    // Else give the error message about no found TeamRole
	    }
	
    	$errorFormMessage = $this->errorFormMessage();
    	
    	// Assigns variables to Smarty
    	//$this->smarty->assign('errorState', $errorState);
    	$this->smarty->assign('isTeamRole', $aValidTeamRole);
    	$this->smarty->assign('errorFormMessage', $errorFormMessage);
    	$this->smarty->assign('teamRoles', $allValidTeamRoles);
    
	    $gestionContactsRoleInfos = $this->smarty->fetch('gestion_contacts_role_infos.tpl');
		$this->smarty->assign('gestionContactsRoleInfos', $gestionContactsRoleInfos);
			
		return $this->smarty->fetch('gestion_contacts_role.tpl');
    }
    
    
    /**
     * Draw the Gestion Contacts Role New
     * @return content HTML of the Gestion Contacts Role New
     */
    protected function drawGestionContactsRoleNew() {
	    		
		// Get TeamRole
    	$messageTeamRoles = $this->tedx_manager->getTeamRoles();
    	
    	// If TeamRole are found, continue
    	if($messageTeamRoles->getStatus()) {
	    	$allValidTeamRoles = $messageTeamRoles->getContent();
    	} else {
	    	$allValidTeamRoles = null;
    	}
    	
    	$errorFormMessage = $this->errorFormMessage();
    	
    	// Assigns variables to Smarty
    	//$this->smarty->assign('errorState', $errorState);
    	$this->smarty->assign('errorFormMessage', $errorFormMessage);
    	$this->smarty->assign('teamRoles', $allValidTeamRoles);
		
		$gestionContactsRoleInfos = $this->smarty->fetch('gestion_contacts_role_infos.tpl');
		$this->smarty->assign('gestionContactsRoleInfos', $gestionContactsRoleInfos);
		
		return $this->smarty->fetch('gestion_contacts_role.tpl');
    }
    
    
    /**
     * Draw the Login page
     * @return content HTML of the Login page
     */
    protected function drawLogin($action) {
    	switch($action) {
	    	case 'login_send':
	    		$mail = $_POST['user_email'];            
		        $password = $_POST['user_password'];
	    		
	    		$this->tedx_manager->login('admin', $password);
	    		if($this->tedx_manager->isLogged()) {
		    		header("Location: ?action=gestion");
		    		return null;
	    		} else {
	    			$this->displayMessage("Your email or password are false.");
	    		}
			default:
				// Assign variables
			    //$this->tedx_manager->login('admin','admin');
			    return $this->smarty->fetch('login.tpl');
			break;
    	}
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
			case 'gestion_contacts_send':
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
				
				try {
					$subnav = null;
					$content = $this->drawLogin($action);
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