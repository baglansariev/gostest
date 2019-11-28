<?php
	if($_SERVER['SERVER_ADDR'] !== '127.0.0.1' && file_exists('config.php')){ require_once('config.php'); }
	else { require_once('config_local.php'); }

	require_once(LIB_PATH . 'devtools.php');
	require_once(LIB_PATH . 'autoload.php');

	$router = new core\engine\Router;
	$router->run();