<?php
    namespace models\modules;
    use core\engine\Model;

    class CallToAction extends Model
    {
        public function getActionData($language_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "call_to_action WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }
    }