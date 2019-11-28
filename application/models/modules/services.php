<?php
    namespace models\modules;
    use core\engine\Model;

    class Services extends Model
    {
        public function getServicesList($language_id = 1)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "services WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }
    }