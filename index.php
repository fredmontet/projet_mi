<?php
	//Include the connexion configurations
	require_once('config/config.php');
	
	// -----------------------------------------------------//
	// --------------------- Header ------------------------//
	// -----------------------------------------------------//
	
	// Recovery of user actionin priority to $ _POST
	if (isset($_POST['action'])) {
	    $action = $_POST['action'];
	} elseif (isset($_GET['action'])) {
	    $action = $_GET['action'];
	} else {
	    $action = 'home';
	}
	
	// assign the variable $action to the smarty variable $action
	$tpl->assign('action', $action);
	
	// generate header
	$tpl->display('includes/templates/header.tpl');
	
	// -----------------------------------------------------//
	// ---------------------- Main -------------------------//
	// -----------------------------------------------------//

	switch($action) {
		case 'home':
			$tpl->display('includes/templates/home.tpl');
		break;
		case 'about':
			$tpl->display('includes/templates/about.tpl');
		break;
		case 'event':
			$tpl->display('includes/templates/events.tpl');
		break;
		case 'videos':
			$tpl->display('includes/templates/videos.tpl');
		break;
		case 'partners':
			$tpl->display('includes/templates/partners.tpl');
		break;
		case 'press':
			$tpl->display('includes/templates/press.tpl');
		break;
		case 'contact':
			$tpl->display('includes/templates/contact.tpl');
		break;
		case 'login':
			$tpl->display('includes/templates/login.tpl');
		break;
	}

	// -----------------------------------------------------//
	// ---------------------- Footer -----------------------//
	// -----------------------------------------------------//
	
	// generate footer
	$tpl->display('includes/templates/footer.tpl');
	
	
?>