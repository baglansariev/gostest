<?php
    namespace controllers\modules\account;
    use core\engine\Controller;

    class Register extends Controller
    {
        public $register_model;

        public function __construct()
        {
            parent::__construct();
            $this->register_model = $this->load->model('modules/account/register');
        }

        public function index()
        {
            $data = array();

            if($this->request->has('user_name', 'post') && $this->request->has('user_email', 'post') &&
                $this->request->has('user_password', 'post') && $this->request->has('user_confirm', 'post')
            ){
                $data['user_name'] = $this->request->post['user_name'];
                $data['user_email'] = $this->request->post['user_email'];

                $data['error_msg'] = $this->validate($data['user_email'], $this->request->post['user_password'], $this->request->post['user_confirm']);

                if(!$data['error_msg']){
                    $password = password_hash($this->request->post['user_password'], PASSWORD_DEFAULT);
                    if($this->register_model->addNewUser($data['user_name'], $data['user_email'], $password)){ $data['success_msg'] = $this->form->success_msg['register']; }
                }
            }

            return $this->load->view('modules/account/register-form', $data);
        }

        public function validate($user_email, $user_password, $password_confirm)
        {
            if(!$this->form->isEmail($user_email)){ return $this->form->error_msg['is_email']; }
            if($this->register_model->hasEmail($user_email)){ return $this->form->error_msg['has_email']; }
            if($user_password !== $password_confirm){ return $this->form->error_msg['password_match']; }
            return null;
        }
    }