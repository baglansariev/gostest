<?php
    namespace core\lib;
    use core\lib\Request;

    class Language
    {
        public $lang = 'kz';
        private $request;

        public function __construct()
        {
            $this->request = new Request;
            $this->lang = $this->getDefaultLang();
        }

        public function getDefaultLang()
        {
            $uri_parts = explode('/', $this->request->getUriWithoutParams());
            $lang = array_pop($uri_parts);

            if($lang == 'ru' || $lang == 'kz'){
                $this->request->cookieSet('lang', $lang);
                return $lang;
            }

            if($this->request->has('lang', 'cookie')){
               return $this->request->cookie['lang'];
            }
            return $this->lang;
        }
    }