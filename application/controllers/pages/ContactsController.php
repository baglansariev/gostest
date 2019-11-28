<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class ContactsController extends Controller
    {
        public function indexAction()
        {
            $language = $this->load->language('pages/contacts');

            $this->view->asset->setTitle($language->get('local_page_title'));

            $data = array();

            // Локализация
            $data['local_city_shymkent'] = $language->get('local_city_shymkent');
            $data['local_city_uralsk'] = $language->get('local_city_uralsk');
            $data['local_city_atyrau'] = $language->get('local_city_atyrau');
            $data['local_city_shymkent_adress'] = $language->get('local_city_shymkent_adress');
            $data['local_city_uralsk_adress'] = $language->get('local_city_uralsk_adress');
            $data['local_city_atyrau_adress'] = $language->get('local_city_atyrau_adress');
            $data['local_director'] = $language->get('local_director');
            $data['local_manager'] = $language->get('local_manager');
            $data['local_regional_manager'] = $language->get('local_regional_manager');
            $data['local_feedback_title'] = $language->get('local_feedback_title');
            $data['local_map_title'] = $language->get('local_map_title');
            $data['local_feedback_name'] = $language->get('local_feedback_name');
            $data['local_feedback_message'] = $language->get('local_feedback_message');
            $data['local_feedback_button'] = $language->get('local_feedback_button');

            $data['page_title'] = $this->load->controller('modules/pageTitle')->getPageTitle($language->get('local_page_title'));

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/contacts', $data);
        }
}