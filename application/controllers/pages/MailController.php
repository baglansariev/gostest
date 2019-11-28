<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class MailController extends Controller
    {
        public function sendMailAction()
        {
            $json = array();

            if(
                $this->request->has('client_name', 'post') &&
                $this->request->has('client_number', 'post') &&
                $this->request->has('client_email', 'post')
            ){

                $name = $this->request->post['client_name'];
                $phone = $this->request->post['client_number'];
                $email = $this->request->post['client_email'];

                if($this->form->isEmail($email)){
                    if($this->request->has('client_text', 'post')){
                        $message = $this->request->post['client_text'];
                    }
                    if(!$this->mail->formSend($name, $phone, $email, $message)){
                        $json['error'] = $this->mail->error_msg;
                    }
                    else{
                        $json['success'] = $this->mail->success_msg;
                    }
                }
                else{
                    $json['error'] = $this->form->error_msg['is_email'];
                }

                $this->response->outputJSON($json);
            }
        }

    }