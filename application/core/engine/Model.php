<?php
	namespace core\engine;

	use core\lib\Db;

	abstract class Model
	{
		public $db;

		public function __construct()
		{
			$this->db = new Db;
		}
	}
