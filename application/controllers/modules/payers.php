<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class Payers extends Controller
    {
        public $payers_model;
        public $lang;

        public function __construct()
        {
            parent::__construct();
            $this->payers_model = $this->load->model('modules/payers');
            $this->lang = $this->load->language('modules/payers');
        }

        public function getPayersList()
        {
            $data = array();
            $payers_list = $this->payers_model->getPayersList();
            $data['payers_list'] = array();

            if($payers_list){
                foreach($payers_list as $key => $payer) {
                    $data['payers_list'][$key]['id'] = $payer['id'];
                    $data['payers_list'][$key]['name'] = $payer['name'];
                    $data['payers_list'][$key]['phone'] = $payer['phone'];
                    $data['payers_list'][$key]['payed_sum'] = number_format($payer['payed_sum'], 0, '', ' ');
                    $data['payers_list'][$key]['status'] = $payer['status'];
                }
            }

            return $this->load->view('modules/payers/payers-list', $data);
        }

        public function getPayersVideo()
        {
            $data = array();
            $payers_video = $this->payers_model->getPayersVideo();
            if($payers_video){
                foreach($payers_video as $key => $payer_video) {
                    $data['payers_video'][$key]['id'] = $payer_video['id'];
                    $data['payers_video'][$key]['url'] = $payer_video['url'];
                }
            }

            $data['local_payers_video_title'] = $this->lang->get('local_payers_video_title');

            return $this->load->view('modules/payers/payers-video', $data);
        }

        public function payersCounter()
        {
            $data = array();

            $data['local_payers'] = $this->lang->get('local_payers');
            $data['local_queue'] = $this->lang->get('local_queue');
            $data['local_recieved'] = $this->lang->get('local_recieved');
            $data['local_bought'] = $this->lang->get('local_bought');

            return $this->load->view('modules/payers/payers-counter', $data);
        }
    }