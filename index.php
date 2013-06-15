<?php
	//Include the connexion configurations
	require_once('config/config.php');
	
	// -----------------------------------------------------//
	// --------------------- Smarty ------------------------//
	// -----------------------------------------------------//
	
	// Import and instantiation of used libraries (Smarty)
	require('includes/Smarty/libs/Smarty.class.php');
	
	// Instantiation and configuration Smarty
	$tpl = new Smarty();
	$tpl->template_dir = 'includes/templates/';	// templates directory
	$tpl->compile_dir = 'includes/Smarty/templates_c/';	// work directory of Smarty
	$tpl->config_dir = 'includes/Smarty/configs/';		// work directory of Smarty 
	$tpl->cache_dir = 'includes/Smarty/cache/';			// work directory of Smarty 
?>
						