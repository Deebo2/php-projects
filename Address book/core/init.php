<?php 
	//include config file
	require_once('config/config.php');
	//include helpers
	require_once('helpers/system_helper.php');
	//Auto loader
	spl_autoload_register(function($className){
		require_once('libraries/'.$className.'.php');
	});
?>