<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class Services extends Controller
    {
        public function getServicesList()
        {
            $data = array();
            $language = $this->load->language();
            $services_model = $this->load->model('modules/services');
            $services = $services_model->getServicesList($language->language_id);

            if($services){
                $data['services'] = array();
                foreach ($services as $key => $service) {
                    $data['services'][$key]['id'] = $service['id'];
                    $data['services'][$key]['title'] = $service['title'];
                    $data['services'][$key]['link'] = $service['link'];
                    $data['services'][$key]['img'] = $service['img'];
                }
            }

            return $this->load->view('modules/services-list', $data);
        }
    }