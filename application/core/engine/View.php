<?php
	namespace core\engine;

	use core\lib\Asset;

	class View
	{
		public $view;
		public $asset;
		public $layout = 'default';

		public function __construct()
		{
			$this->asset = new Asset;
		}

		public function response($path, $arr = [])
		{
			extract($arr);

			ob_start();
			require_once(VIEWS_PATH . $path . '.php');
			$content = ob_get_clean();
			
			require_once(LAYOUTS_PATH . $this->layout . '.php');
		}

		public function errorResponse($path, $type)
		{
			http_response_code($type);
			
			ob_start();
			require_once(VIEWS_PATH . $path . '.php');
			$content = ob_get_clean();
			
			require_once(LAYOUTS_PATH . 'default.php');
			exit();
		}

	}

