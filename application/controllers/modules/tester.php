<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class Tester extends Controller
    {
        public $test_model;

        public function __construct()
        {
            parent::__construct();
            $this->test_model = $this->load->model('modules/tester');
        }

        public function getTestList()
        {
            $data = array();
            $tests = $this->test_model->getTestList(1);
            if($tests){
                $data['tests'] = array();
                foreach ($tests as $key => $test) {
                    $data['tests'][$key]['id'] = $test['id'];
                    $data['tests'][$key]['text'] = $test['text'];
                    $data['tests'][$key]['href'] = $test['href'];
                    $data['tests'][$key]['price'] = '150';
                }
            }
            return $this->load->view('modules/tester/test-list', $data);
        }

        public function setTest()
        {
            //
        }

        public function setTestQuestion()
        {
            //
        }
    }