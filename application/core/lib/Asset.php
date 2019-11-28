<?
	namespace core\lib;

	class Asset
	{
		private $title;
		private $metaDesc;
		private $metaKeys;
		private $css = [];
		private $js = [];

		public function setTitle($title = '')
		{
			$this->title = $title;
		}

		public function getTitle()
		{
			return $this->title;
		}

		public function setMetaDesc($metaDesc = '')
		{
			$this->metaDesc = $metaDesc;
		}

		public function getMetaDesc()
		{
			return $this->metaDesc;
		}

		public function setMetaKeys($metaKeys = '')
		{
			$this->metaKeys = $metaKeys;
		}

		public function getMetaKeys()
		{
			return $this->metaKeys;
		}

		public function setCss($css)
		{
			$this->css[] = $css;
		}

		public function getCss()
		{
			return $this->css;
		}

		public function setJs($js)
		{
			$this->js[] = $js;
		}

		public function getJs()
		{
			return $this->js;
		}
	}
	
?>