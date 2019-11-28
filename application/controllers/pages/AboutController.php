<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class AboutController extends Controller
    {
        public function indexAction()
        {
            $language = $this->load->language('pages/about');
            $this->view->asset->setTitle($language->get('local_about_page_title'));

            $data = array();

            $data['local_about_section_title'] = $language->get('local_about_section_title');
            $data['local_about_section_text'] = $language->get('local_about_section_text');

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/about', $data);
        }
    }