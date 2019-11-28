<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class PageTitle extends Controller
    {
        public function getPageTitle($title = 'Page Title')
        {
            $data = array();
            $data['title'] = $title;
            return $this->load->view('modules/page-title', $data);
        }
    }