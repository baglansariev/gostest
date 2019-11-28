<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class PopupContactForm extends Controller
    {
        public function index()
        {
            return $this->load->view('modules/popup-contact-form');
        }
    }