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
 * @todo impl�menter la suppression et la modification 
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
    
    protected function getNextEvent() {
	    $currentEvent = $this->tedx_manager->getEvent(1);
	    return $currentEvent;
    }
    
    
    /**
     * Interpr�te l'action utilisateur et retourne le code HTML correspondant
     * @return string Code HTML correspondant � l'action choisie par l'utilisateur
     */
    protected function getContent($action) {
        switch($action) {
        	case 'home':
        		$this->smarty->assign('nextEvent', $this->getNextEvent());
			break;
			case 'about':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/about.html');
			break;			
			case 'logout':
				$this->tedx_manager->logout();
			break;
			case 'login':
				$this->tedx_manager->login('Penelope','anitakevinlove');
			break;
		}	
    }

    /**
     * Point d'entr�e principal
     * Effectue l'action correspondante � l'action recue en POST ou GET  
     */
    public function main() {
	
        // R�cup�ration de l'action en cours, action par d�faut: list
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list'; 
        
        // Assigne l'action en cours (pour affichage du menu)        
        $this->smarty->assign('action', $action);
              
        // R�cup�re le code HTML correspondant � l'action utilisateur choisie        
        try {
            $content = $this->getContent($action);
        } catch (Exception $e) {
            //$this->displayMessage('UnknownError');        	
        }
        
        // Assigne les information utilisateur pour affichagge   
        $this->smarty->assign('userIsLogged', $this->tedx_manager->isLogged());
        $this->smarty->assign('username', $this->tedx_manager->getUsername());
        
        $this->smarty->assign('content', $content);

        // Assignation des id de messages � afficher
        //$this->smarty->assign('messages', $this->messages);

        // Affichage de l'IHM
        $this->smarty->display('main.tpl');        
    }    
}

?>