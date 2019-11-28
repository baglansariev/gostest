<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class MainSlide extends Controller
    {
        public function index()
        {
            $slide_model = $this->load->model('modules/mainSlide');
            $language = $this->load->language();
            $slide_data = $slide_model->getSlide($language->language_id);
            $data = array();

            if($slide_data){
                foreach($slide_data as $key => $slide) {
                    $data['slide_data'][$key]['id'] = $slide['id'];
                    $data['slide_data'][$key]['title'] = $slide['title'];
                    $data['slide_data'][$key]['subtitle'] = $slide['subtitle'];
                    $data['slide_data'][$key]['img'] = $slide['img'];

                    $slide_links = $slide_model->getSlideLinks($slide['id']);
                    if($slide_links){
                        foreach($slide_links as $data_key => $slide_link){
                            $data['slide_data'][$key]['links'][$data_key]['id'] = $slide_link['id'];
                            $data['slide_data'][$key]['links'][$data_key]['text'] = $slide_link['text'];
                            $data['slide_data'][$key]['links'][$data_key]['href'] = $slide_link['href'];
                        }
                    }

                }
            }

            return $this->load->view('modules/main-slide', $data);
        }
    }