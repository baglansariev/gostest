<?php
    namespace core\lib;

    class Response
    {
        public function addHeader($param)
        {
            header($param);
        }

        public function output($param)
        {
            echo $param;
        }

        public function outputJSON($param)
        {
            $this->addHeader('Content-type: application/json');
            $this->output(json_encode($param));
        }

        public function outputJSON_HTML($param)
        {
            $this->addHeader('Content-type: application/json');
            $this->output(json_encode($param), SON_HEX_QUOT | JSON_HEX_TAG);
        }

        public function redirect($location)
        {
            header('Location: ' . $location);
        }
    }