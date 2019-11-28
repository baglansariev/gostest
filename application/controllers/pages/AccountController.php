<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class AccountController extends Controller
    {
        public $login;
        public $user_name;
        public $user_status;
        public $user_balance;

        public function __construct()
        {
            parent::__construct();
            $this->login = $this->load->controller('modules/account/login');
            $this->user_name = $this->session->get('user_name');
            $this->user_status = ucfirst($this->session->get('user_status'));
            $this->user_balance = $this->session->get('user_balance');
        }

        public function loginAction()
        {
            if($this->login->isLogged()){ $this->response->redirect('/account'); }

            $this->view->asset->setTitle('Вход');
            $data = array();

            $data['login_form'] = $this->login->getLoginForm();
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/account/login', $data);
        }

        public function registerAction()
        {
//            if(!$this->login->isAdmin()){ $this->response->redirect('/'); }

            $this->view->asset->setTitle('Регистрация');
            $data = array();

            $data['register_form'] = $this->load->controller('modules/account/register');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/account/register', $data);
        }

        public function accountAction()
        {
            if(!$this->login->isLogged()){ $this->response->redirect('/login'); }

            $this->view->asset->setTitle($this->session->get('user_name'));
            $this->view->asset->setCss('/public/style/css/account.css');

            $data['user_name'] = $this->user_name;
            $data['user_status'] = $this->user_status;
            $data['user_balance'] = $this->user_balance;
            $data['menu_list'] = $this->load->controller('common/menu')->accountMenu($this->session->get('user_status'));
            $data['module'] = '';


            $this->view->response('pages/account/account', $data);
        }

        public function testsAction()
        {
            if(!$this->login->isLogged()){ $this->response->redirect('/login'); }

            $this->view->asset->setTitle($this->session->get('user_name'));
            $this->view->asset->setCss('/public/style/css/account.css');

            $data['user_name'] = $this->user_name;
            $data['user_status'] = $this->user_status;
            $data['user_balance'] = $this->user_balance;
            $data['menu_list'] = $this->load->controller('common/menu')->accountMenu($this->session->get('user_status'));
            $data['module'] = $this->load->controller('modules/tester')->getTestList();


            $this->view->response('pages/account/account', $data);
        }

        public function logoutAction()
        {
            if($this->login->isLogged()){
                $this->session->del('user_email');
                $this->session->del('user_name');
                $this->session->del('user_status');
                $this->response->redirect('/login');
            }
            else{ $this->response->redirect('/login'); }
        }
    }