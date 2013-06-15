<?php
	/**
	 * config.php
	 * 
	 * Author : Fred Montet
	 * Date : 14.06.2013
	 * 
	 * Description : All configurations
	 * 
	 */	
		
	//Access to the application controller 
	require_once('tedx-config.php');
	
	//Error reporting. 
	ini_set("error_reporting", "true");  
	error_reporting(E_ALL|E_STRCT);
	
	// -----------------------------------------------------//
	// --------------------- Smarty ------------------------//
	// -----------------------------------------------------//
	
	// Import and instantiation of used libraries (Smarty)
	require('includes/Smarty/libs/Smarty.class.php');
	
	// Instantiation and configuration Smarty
	$tpl = new Smarty();
	$tpl->template_dir = '../includes/templates/';			// templates directory
	$tpl->compile_dir = '../includes/Smarty/templates_c/';	// work directory of Smarty
	$tpl->config_dir = '../includes/Smarty/configs/';		// work directory of Smarty 
	$tpl->cache_dir = 'includes/Smarty/cache/';			// work directory of Smarty
	
	
?>