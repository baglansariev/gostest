<?php
    namespace controllers\modules;
    use core\engine\Controller;

    class OwlGallery extends Controller
    {
        public function getImages($images = array())
        {
            $data = array();
            $data['images'] = array();

            if(!$images){
                $owl_model = $this->load->model('modules/owlGallery');
                $images = $owl_model->getImages();
            }

            foreach($images as $key => $image){
                if(isset($image['src'])){
                    $data['images'][$key]['src'] = $image['src'];
                }
                else if(isset($image['url'])){
                    $data['images'][$key]['src'] = $image['url'];
                }
            }

            return $this->load->view('modules/owl-gallery', $data);
        }
    }