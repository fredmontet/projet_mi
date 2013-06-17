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
 * @todo implŽmenter la suppression et la modification 
 */
class TEDx {    
   

    /**
     * Smarty object
     * @var Smarty
     */
    protected $smarty;
    
    /**
     * ContactManager object 
     * @var ContactManager
     */
    protected $tedx_manager;  
    
        
    /**
     * Constructor
     * Initialise les objets ContactManager, Smarty et auth
     */
    public function __construct($tedx_manager) {
    
    	$this->tedx_manager = $tedx_manager;
        
        // Smarty instance
        $tplDir = TEDx_ROOTPATH . TEDx_TPL_DIR;      
        $tplcDir = TEDx_ROOTPATH . TEDx_TPLC_DIR;      
        $this->smarty = new Smarty;
        $this->smarty->template_dir = $tplDir;
        $this->smarty->compile_dir = $tplcDir;
     
    }       
    
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
	    
    protected function getNextEvent() {
	    $currentEvent = $this->tedx_manager->getEvent(1);
	    return $currentEvent;
    }
    
    protected function getHome() {
	    //return $this->getNextEvent();
		return $this->smarty->fetch('home.tpl');
    }
    
    protected function getEvents() {
    	//$allEvents = $this->tedx_manager->getEvents();
	    return $this->smarty->fetch('events.tpl');
    }
    
    protected function getContactForm() {
	    return $this->smarty->fetch('contact.tpl');
    }
    
    protected function getUserInfo() {
	    return $this->smarty->fetch('userinfo.tpl');
    }
    
    
    /**
     * Interprte l'action utilisateur et retourne le code HTML correspondant
     * @return string Code HTML correspondant ˆ l'action choisie par l'utilisateur
     */
    protected function getContent($action) {
        switch($action) {
        	case 'home':
        		return $this->getHome();
			break;
			case 'about':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/about.html');
			break;
			case 'events':
				return $this->getEvents();
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
				return $this->getContactForm();
			break;		
			case 'gestion':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/gestion.html');
			break;				
			case 'logout':
				$this->tedx_manager->logout();
				header("Location: ?action=home");
			break;
			case 'login':
				//$this->tedx_manager->login('Penelope','anitakevinlove');
				$this->tedx_manager->login('admin','admin');
			break;
			case 'userinfo':
				return $this->getUserInfo();
			break;
		}	
    }

    /**
     * Point d'entrŽe principal
     * Effectue l'action correspondante ˆ l'action recue en POST ou GET  
     */
    public function main() {
	
        // RŽcupŽration de l'action en cours, action par dŽfaut: list
        
        if (isset($_REQUEST['action'])) {
		    $action = $_REQUEST['action'];
		} else {
		    $action = 'home';
		}

        //$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list'; 
        
        // Assigne l'action en cours (pour affichage du menu)        
        $this->smarty->assign('action', $action);
              
        // RŽcupre le code HTML correspondant ˆ l'action utilisateur choisie        
        try {
            $content = $this->getContent($action);
        } catch (Exception $e) {
            //$this->displayMessage('UnknownError');        	
        }
        
        // Assigne les information utilisateur pour affichagge   
        $this->smarty->assign('userIsLogged', $this->tedx_manager->isLogged());
        $this->smarty->assign('username', $this->tedx_manager->getUsername());
        
        $this->smarty->assign('content', $content);

        // Assignation des id de messages ˆ afficher
        //$this->smarty->assign('messages', $this->messages);

        // Affichage de l'IHM
        $this->smarty->display('main.tpl');        
    }    
}

?>