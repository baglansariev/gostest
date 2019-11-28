<?php
    namespace controllers\modules\account;
    use core\engine\Controller;

    class Login extends Controller
    {
        public $login_model;

        public function __construct()
        {
            parent::__construct();
            $this->login_model = $this->load->model('modules/account/login');
        }

        public function getLoginForm()
        {
            $data = array();

            if($this->request->has('user_email', 'post') && $this->request->has('user_password', 'post')){
                $data['error_msg'] = $this->login($this->request->post['user_email'], $this->request->post['user_password']);
            }

            return $this->load->view('modules/account/login-form', $data);
        }

        public function login($email, $password)
        {
            if(!$this->form->isEmail($email)){ return $this->form->error_msg['is_email']; }
            $user = $this->login_model->getUserData($email);
            if($user['banned']){ return $this->form->error_msg['is_banned']; }

            if(!$user || !password_verify($password, $user['password'])){ return $this->form->error_msg['login_pass']; }

            $this->session->set('user_email', $email);
            $this->session->set('user_name', $user['name']);
            $this->session->set('user_status', $user['role']);
            $this->session->set('user_balance', $user['balance']);

            $this->response->redirect('/account');
        }

        public function isLogged()
        {
            if($this->session->has('user_email') && $this->session->has('user_status')){
                return true;
            }
            return false;
        }

        public function isAdmin()
        {
            if($this->isLogged() && $this->session->get('user_status') == 'admin'){
                return true;
            }
            return false;
        }
    }