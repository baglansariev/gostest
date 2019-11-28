<?php
	namespace controllers\common;
	use core\engine\Controller;

	class Footer extends Controller
	{
		public function index()
		{
		    $language = $this->load->language('common/footer');
		    $data = array();

            $data['local_about_us_title'] = $language->get('local_about_us_title');
            $data['local_about_us'] = $language->get('local_about_us');
		    $data['local_instagram_title'] = $language->get('local_instagram_title');
		    $data['local_contacts_title'] = $language->get('local_contacts_title');
		    $data['local_adress_text'] = $language->get('local_adress_text');
		    $data['local_adress'] = $language->get('local_adress');
		    $data['local_client_sign'] = $language->get('local_client_sign');
		    $data['local_developer_sign'] = $language->get('local_developer_sign');

            $data['calc_module'] = $this->load->controller('modules/calculator')->popupCalcModule();

			return $this->load->view('common/footer', $data);
		}
	}
