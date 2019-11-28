<?php

    namespace controllers\pages;
    use core\engine\Controller;

    class NewsController extends Controller
    {
        public function indexAction()
        {
            $this->view->asset->setTitle('Новости');
            $this->view->asset->setCss('/public/style/css/news.css');

            $data = array();
            $data['page_title'] = $this->load->controller('modules/pageTitle')->getPageTitle('Новости');
            $data['news_list'] = $this->load->controller('modules/news')->getList(6, true);
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/news/index', $data);
        }

        public function articleAction()
        {
            $this->view->asset->setTitle('Новости');
            $this->view->asset->setCss('/public/style/css/news.css');
            $this->view->asset->setCss('/public/style/owl-carousel/owl-gallery.css');
            $this->view->asset->setJs('/public/style/owl-carousel/owl-carousel-switcher.js');

            $data = array();

            $data['article'] = $this->load->controller('modules/news')->article();
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/news/one-news', $data);
        }
    }