<?php
    namespace models\modules;
    use core\engine\Model;

    class FeatureBox extends Model
    {
        public function getList($language_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "featurebox WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }
    }