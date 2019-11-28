<?php
    namespace models\modules;
    use core\engine\Model;

    class Advantages extends Model
    {
        public function getList($language_id = 1)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "advantages WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }
    }