<?php        
    require_once('includes/class/TEDx.php');    
    try {
        $myTEDx = new TEDx($tedx_manager);
        $myTEDx->main();
    } catch (Exception $e) {
    	print "L'application est momentan�ment indisponible. ";
        print "Veuillez r�essayer ult�rieurement";
    }
?>