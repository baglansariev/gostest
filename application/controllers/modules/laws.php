<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class Laws extends Controller
    {
        public $law_model;

        public function __construct()
        {
            parent::__construct();
            $this->law_model = $this->load->model('modules/laws');
        }

        public function getLawsList($language_id)
        {
            $data = array();
            $laws = $this->law_model->getLawsList($language_id);

            if($laws){
                $data['laws'] = array();
                foreach ($laws as $key => $law) {
                    $data['laws'][$key]['id'] = $law['id'];
                    $data['laws'][$key]['text'] = $law['text'];
                    $data['laws'][$key]['href'] = $law['href'] ?: '#';
                }
            }

            return $data['laws'];
        }
    }