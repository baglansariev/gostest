<?
    namespace core\lib;

    use core\lib\Session;

    class Request
    {
        public $get = array();
        public $post = array();
        public $request = array();
        public $files = array();
        public $cookie = array();
        public $session;
        private $uri;

        public function __construct()
        {
            $this->uri = trim($_SERVER['REQUEST_URI'], '/');
            $this->get = $this->getValue($_GET);
            $this->post = $this->getValue($_POST);
            $this->request = $this->getValue($_REQUEST);
            $this->files = $this->getValue($_FILES);
            $this->cookie = $this->getValue($_COOKIE);
            $this->session = new Session;
        }

        public function getUri()
        {
            return $this->uri;
        }

        public function getUriWithoutParams()
        {
            $uri = explode('?', $this->uri);

            if(is_array($uri)){
                return array_shift($uri);
            }

            return $this->uri;
        }

        public function has($key, $request_method = 'request')
        {

            if(is_array($key)){
                foreach ($key as $item => $val) {
                    if(!empty($this->$request_method[$item]) && !empty($this->$request_method[$item][$val])){
                        return true;
                    }
                }
            }
            else{
                if(!empty($this->$request_method[$key])){
                    return true;
                }
            }
            return false;

        }

        private function getValue($data)
        {
            return $data;
        }

        public function cookieSet($name, $value, $life_time = 60*60*24)
        {
            $life_time = time() + $life_time;
            setcookie($name, $value, $life_time);
        }
    }
