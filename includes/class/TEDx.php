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
     * Constructor
     * Initialise les objets ContactManager, Smarty et auth
     */
    public function __construct() {
        
        // Smarty instance
        $tplDir = TEDx_ROOTPATH . TEDx_TPL_DIR;      
        $tplcDir = TEDx_ROOTPATH . TEDx_TPLC_DIR;      
        $this->smarty = new Smarty;
        $this->smarty->template_dir = $tplDir;
        $this->smarty->compile_dir = $tplcDir;
     
    }        
    
    /**
     * Interprte l'action utilisateur et retourne le code HTML correspondant
     * @return string Code HTML correspondant ˆ l'action choisie par l'utilisateur
     */
    protected function getContent($action) {
        switch($action) {
			case 'about':
				return file_get_contents(TEDx_ROOTPATH . 'htdocs/html/about.html');
			break;
		}	
    }

    /**
     * Point d'entrŽe principal
     * Effectue l'action correspondante ˆ l'action recue en POST ou GET  
     */
    public function main() {
        // RŽcupŽration de l'action en cours, action par dŽfaut: list
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list'; 
        
        // Assigne l'action en cours (pour affichage du menu)        
        $this->smarty->assign('action', $action);
        
        // RŽcupre le code HTML correspondant ˆ l'action utilisateur choisie        
        try {
            $content = $this->getContent($action);
        } catch (Exception $e) {
            //$this->displayMessage('UnknownError');        	
        }
        $this->smarty->assign('content', $content);

        // Assignation des id de messages ˆ afficher
        //$this->smarty->assign('messages', $this->messages);

        // Affichage de l'IHM
        $this->smarty->display('main.tpl');        
    }    
}

?>