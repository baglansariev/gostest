<?php
    namespace models\modules;
    use core\engine\Model;

    class Payers extends Model
    {
        public function getPayersList()
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "payers";
            return $this->db->getAllRows($sql);
        }

        public function getPayersVideo()
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "payers_video";
            return $this->db->getAllRows($sql);
        }
    }