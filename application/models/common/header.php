<?php
    namespace models\common;
    use core\engine\Model;

    class Header extends Model
    {
        public function getMenuList()
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "menu ORDER BY sort";
            return $this->db->getAllRows($sql);
        }
    }