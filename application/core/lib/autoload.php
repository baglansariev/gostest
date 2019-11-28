<?php

	spl_autoload_register(function($class){
		$path = DOCUMENT_ROOT . DS . 'application' . DS . $class . '.php';
		$path = str_replace('\\', DS, $path);
		if(file_exists($path)){
			require_once($path);		
		}
	});
