<?php
    namespace core\lib;
    use core\lib\Request;
    use core\lib\phpMailer\src\PHPMailer;

    class Mail
    {
        public $phpMailer;
        public $request;
        public $success_msg;
        public $error_msg;

        public function __construct()
        {
            $this->request = new Request;
            $this->phpMailer = new PHPMailer;
        }
        public function formSend($name, $phone, $email, $message = 'нет')
        {
            $this->setPhpMailerParams();
            // Письмо
            $this->phpMailer->Subject = 'Сайт ПИОНЕР: Клиент ' . $name . ' заказал звонок'; // Заголовок письма
            $this->phpMailer->Body = "Клиент заказал обратный звонок с сайта pioneer-group.kz <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Имя: $name <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Телефон: $phone <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "E-mail клиента: $email <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Сообщение клиента: $message <br> \r\n"; // Текст письма
            // Результат
            if(!$this->phpMailer->send()){
                $this->sendErrorMessage();
                $this->setMessage('error');
                return false;
            }
            $this->setMessage('success');
            return true;
        }

        public function questionFormSend($client_name, $client_phone, $client_email, $client_question)
        {
            $this->setPhpMailerParams();
            // Письмо
            $this->phpMailer->Subject = 'Сайт АСАР КАЗЫНА: Клиент ' . $client_name . ' задал вопрос'; // Заголовок письма
            $this->phpMailer->Body = "Клиент задал вопрос на странице ВОПРОС-ОТВЕТ с сайта asarkazyna.kz <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Имя: $client_name <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Телефон: $client_phone <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "E-mail клиента: $client_email <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Вопрос клиента: $client_question <br> \r\n"; // Текст письма
            // Результат
            if(!$this->phpMailer->send()){
                $this->sendErrorMessage();
                $this->setMessage('error');
                return false;
            }
            $this->setMessage('success');
            return true;
        }

        private function setPhpMailerParams()
        {
            // Настройки
            $this->phpMailer->CharSet = 'UTF-8';
            $this->phpMailer->isSMTP();
            $this->phpMailer->Host = 'smtp.mail.ru';
            $this->phpMailer->SMTPAuth = true;
            $this->phpMailer->Username = 'baglansariev@mail.ru'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
            $this->phpMailer->Password = ''; // Ваш пароль
            $this->phpMailer->SMTPSecure = 'ssl';
            $this->phpMailer->Port = 465;
            $this->phpMailer->setFrom('baglansariev@mail.ru'); // Ваш Email
            $this->phpMailer->addAddress('baglansariev@mail.ru'); // Email получателя
            $this->phpMailer->isHTML(true);
        }

        private function sendErrorMessage()
        {
            $error_message = 'Message from Modal Form could not be sent. ';
            $error_message .= 'Mailer Error: ' . $this->phpMailer->ErrorInfo;
            $error_message .= ' Time: ' . date('d.m.Y H:i:s');

            $file_path = CORE_PATH . 'error.log';
            $file_content = file_get_contents($file_path);
            $file_content = $file_content . ' \r\n ' . $error_message;
            file_put_contents($file_path, $file_content);
        }

        private function setMessage($status)
        {
            switch ($status){
                case 'success': $this->success_msg = 'Ваше сообщение успешно отправлено';
                    break;
                case 'error': $this->error_msg = 'Произошла ошибка! Пожалуйста попробуйте попозже.';
                    break;
                default: '';
                    break;
            }
        }
    }