<?php
	namespace controllers\common;
	use core\engine\Controller;

	class Header extends Controller
	{
		public function index()
		{
		    $data = array();
		    $language = $this->load->language('common/header');
		    $login = $this->load->controller('modules/account/login');

            $data['local_sign_in'] = $language->get('local_sign_in');
		    if($login->isLogged()){
                $data['local_sign_in'] = $language->get('local_account');
            }

		    $data['local_feedback'] = $language->get('local_feedback');

		    $data['desktop_menu'] = $this->load->controller('common/menu')->mainMenu('desktop');
		    $data['mobile_menu'] = $this->load->controller('common/menu')->mainMenu('mobile');
            $data['languages'] = $this->load->controller('common/language')->getLanguageList();
		    $data['popup_form'] = $this->load->controller('modules/popupContactForm');

			return $this->load->view('common/header', $data);
		}
	}
