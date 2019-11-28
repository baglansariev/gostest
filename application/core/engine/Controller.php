<?php
	namespace core\engine;

    use core\engine\Loader;
    use core\engine\View;
    use core\lib\Form;
    use core\lib\Request;
    use core\lib\Response;
    use core\lib\Session;
    use core\lib\Mail;
    use core\lib\Language;

	abstract class Controller
	{
        public $request;
        public $load;
        public $view;
        public $session;
        public $response;
        public $form;
        public $mail;
        public $language;

		public function __construct()
		{
            $this->request = new Request;
            $this->load = new Loader;
            $this->view = new View;
            $this->session = new Session;
            $this->response = new Response;
            $this->form = new Form;
            $this->mail = new Mail;
            $this->language = new Language;
		}
	}