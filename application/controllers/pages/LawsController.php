<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class LawsController extends Controller
    {
        public $lang, $laws;
        public function __construct()
        {
            parent::__construct();
            $this->lang = $this->load->language('pages/laws');
            $this->laws = $this->load->controller('modules/laws');
        }

        public function indexAction()
        {
            $this->view->asset->setTitle($this->lang->get('local_page_title'));

            $data = array();
            $data['laws'] = $this->laws->getLawsList($this->lang->language_id);
            $data['laws_title'] = $this->lang->get('local_page_title');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/laws', $data);
        }
    }