<?php
    namespace models\modules\account;
    use core\engine\Model;

    class Register extends Model
    {
        public function addNewUser($user_name, $user_email, $user_password)
        {
            $sql = "INSERT INTO " . DB_PREFIX . "users SET name = '" . $user_name . "', email = '" . $user_email . "', password = '" . $user_password . "'";
            if($this->db->changeData($sql)) return true;
        }

        public function hasEmail($email)
        {
            $sql = "SELECT COUNT(*) as count FROM " . DB_PREFIX . "users WHERE email = '" . $email . "'";
            return $this->db->getRow($sql)['count'];
        }
    }