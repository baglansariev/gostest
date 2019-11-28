<?php
    namespace core\lib;

    class Session
    {
        public function get($key = '')
        {
            if($this->has($key)){
                return $_SESSION[$key];
            }
        }

        public function has($key)
        {
            if(!empty($_SESSION[$key])){
                return true;
            }
            return false;
        }

        public function set($key, $value = '')
        {
            if(is_array($key)){
                foreach($key as $name => $val){
                    if(is_string($name)){
                        $_SESSION[$name] = $val;
                    }
                }
            }
            else{
                $_SESSION[$key] = $value;
            }
        }

        public function del($key)
        {
            unset($_SESSION[$key]);
        }

        public function clear()
        {
            session_destroy();
        }
    }