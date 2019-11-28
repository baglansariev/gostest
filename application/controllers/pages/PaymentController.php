<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class PaymentController extends Controller
    {
        public function indexAction()
        {
            $language = $this->load->language('pages/faq');

            $this->view->asset->setTitle($language->get('local_page_title'));
            $this->view->asset->setCss('/public/style/css/accordion.css');
            $this->view->asset->setJs('/public/style/js/accordion.js');

            $data = array();
            $data['page_title'] = $this->load->controller('modules/pageTitle')->getPageTitle($language->get('local_page_title'));

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/payment', $data);
        }
    }