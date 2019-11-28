<?php
    namespace models\modules;
    use core\engine\Model;

    class Laws extends Model
    {
        public function getLawsList($language_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "laws WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }
    }