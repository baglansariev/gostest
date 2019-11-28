<?php
    namespace controllers\common;
    use core\engine\Controller;

    class Language extends Controller
    {
        public $language_id;
        public $language_code;
        public $language_path;
        private $language_model;

        public function __construct($path = false)
        {
            parent::__construct();
            $this->language_model = $this->load->model('common/language');
            $this->language_id = $this->language_model->getLanguageId($this->language->lang);
            $this->language_code = $this->language_model->getLanguageCode($this->language->lang);
            $this->language_path = $path;
        }

        public function getLanguageList()
        {
            $data = array();
            $data['languages'] = array();

            $languages = $this->language_model->getLanguageList();

            if($languages){
                foreach($languages as $key => $language){
                    $data['languages'][$key]['id'] = $language['id'];
                    $data['languages'][$key]['name'] = $language['name'];
                    $data['languages'][$key]['link'] = $language['link'];
                    $language['link'] == $this->language->lang ? $data['languages'][$key]['class'] = 'lang-active' : $data['languages'][$key]['class'] = '';
                }
            }

            return $data['languages'];
        }

        public function get($key)
        {
            $path = LANGUAGE_PATH . $this->language_code . '/' . $this->language_path . '.php';
            if(file_exists($path)){
                $localisation = include $path;
                return $localisation[$key];
            }
            return false;
        }

    }