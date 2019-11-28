<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class CallToAction extends Controller
    {
        public function index()
        {
            $data = array();
            $action_model = $this->load->model('modules/callToAction');
            $language = $this->load->language();
            $action_data = $action_model->getActionData($language->language_id);

            if($action_data){
                foreach($action_data as $key => $action_info) {
                    $data['action_data'][$key]['id'] = $action_info['id'];
                    $data['action_data'][$key]['title'] = $action_info['title'];
                    $data['action_data'][$key]['subtitle'] = $action_info['subtitle'];
                    $data['action_data'][$key]['button_text'] = $action_info['button_text'];
                }
            }

            return $this->load->view('modules/callToAction', $data);
        }
    }