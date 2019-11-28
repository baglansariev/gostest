<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class Advantages extends Controller
    {
        public function index()
        {
            $data = array();
            $language = $this->load->language();
            $advantages_model = $this->load->model('modules/advantages');
            $advantages = $advantages_model->getList($language->language_id);

            $data['advantages'] = array();
            if($advantages){
                foreach($advantages as $key => $advantage){
                    $data['advantages'][$key]['title'] = $advantage['title'];
                    $data['advantages'][$key]['text'] = $advantage['text'];
                }
            }

            return $this->load->view('modules/advantages', $data);
        }
    }