<?php        
    require_once('includes/class/TEDx.php');    
    try {
        $myTEDx = new TEDx();
        $myTEDx->main();
    } catch (Exception $e) {
    	print "L'application est momentanément indisponible. ";
        print "Veuillez réessayer ultérieurement";
    }
?>