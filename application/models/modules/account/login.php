<?php
    namespace models\modules\account;
    use core\engine\Model;

    class Login extends Model
    {
        public function getUserRole($user_email)
        {
            $sql = "SELECT role AS role FROM " . DB_PREFIX . "users WHERE email = '" . $user_email . "'";
            return $this->db->getRow($sql)['role'];
        }

        public function hasEmail($email)
        {
            $sql = "SELECT COUNT(*) AS count FROM " . DB_PREFIX . "users WHERE email = '" . $email . "'";
            return $this->db->getRow($sql)['count'];
        }

        public function getUserData($email)
        {
            $sql = "SELECT * FROM "
                . DB_PREFIX . "users LEFT JOIN "
                . DB_PREFIX . "user_data ON "
                . DB_PREFIX . "users.id = "
                . DB_PREFIX . "user_data.user_id WHERE email = '" . $email . "'";
            return $this->db->getRow($sql);
        }
    }