<?php
// Chemin vers la racine de l'application
define('TEDx_ROOTPATH', '');  

require_once(TEDx_ROOTPATH . 'config/TEDx.php');
require_once(TEDx_ROOTPATH . TEDx_SMARTY_DIR . 'Smarty.class.php');


/**
 * IHM pour la gestion de TEDx
 * @package ContactBook
 * @uses PEAR::DB DB abstraction class
 * @uses PEAR::Auth Auth manager
 * @uses Contact 
 * @uses ContactManager 
 * @todo implémenter la suppression et la modification 
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
     * Initialise les objets TEDx Manager et Smarty
     */
    public function __construct($tedx_manager) {
    
    	$this->tedx_manager = $tedx_manager;
        
        // Instance Smarty
        $tplDir = TEDx_ROOTPATH . TEDx_TPL_DIR;      
        $tplcDir = TEDx_ROOTPATH . TEDx_TPLC_DIR;      
        $this->smarty = new Smarty;
        $this->smarty->template_dir = $tplDir;
        $this->smarty->compile_dir = $tplcDir;
     
    }       
    
    /*
    public function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	*/
	    
    protected function drawNextEvent() {
	    $currentEvent = $this->tedx_manager->getEvent(1);
	    return $currentEvent;
    }
    
    /**********************************************************/
    /********************** Dynamic page **********************/
    /**********************************************************/
    
    protected function drawHome() {
    	$nextEvent = $this->tedx_manager->getEvent(1);
    	$this->smarty->assign('nextEvent', $nextEvent->mainTopic);
		var_dump($this->tedx_manager->getEvent(1));
		return $this->smarty->fetch('home.tpl');
    }
    
    protected function drawEvents() {
	    return $this->smarty->fetch('events.tpl');
    }
    
    protected function drawContact() {
	    return $this->smarty->fetch('contact.tpl');
    }
    
    protected function drawUserInfo() {
    	// Assign variables
	    //$this->smarty->assign('firstname', $this->tedx_manager->getFirstname());
	    
	    return $this->smarty->fetch('userinfo.tpl');
    }
    
    
    /**
     * Interprète l'action utilisateur et retourne le code HTML correspondant
     * @return string Code HTML correspondant à l'action choisie par l'utilisateur
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
     * Point d'entrée principal
     * Effectue l'action correspondante à l'action recue en POST ou GET  
     */
    public function main() {
	
        // Récupération de l'action en cours, action par défaut: list
        
        if (isset($_REQUEST['action'])) {
		    $action = $_REQUEST['action'];
		} else {
		    $action = 'home';
		}
        
        // Assigne l'action en cours (pour affichage du menu)        
        $this->smarty->assign('action', $action);
              
        // Récupère le code HTML correspondant à l'action utilisateur choisie        
        try {
            $content = $this->getContent($action);
        } catch (Exception $e) {
            //$this->displayMessage('UnknownError');        	
        }
        
        // Assigne les information utilisateur pour affichagge   
        $this->smarty->assign('userIsLogged', $this->tedx_manager->isLogged());
        $this->smarty->assign('username', $this->tedx_manager->getUsername());
        
        $this->smarty->assign('content', $content);

        // Assignation des id de messages à afficher
        //$this->smarty->assign('messages', $this->messages);

        // Affichage de l'IHM
        $this->smarty->display('main.tpl');        
    }    
}

?>