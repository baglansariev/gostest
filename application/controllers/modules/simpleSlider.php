<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class SimpleSlider extends Controller
    {
        public function index()
        {
            $slider_model = $this->load->model('modules/simpleSlider');
            $data = array();
            $data['slider_data'] = $slider_model->getSliderData();

            return $this->load->view('modules/simpleSlider', $data);
        }
    }