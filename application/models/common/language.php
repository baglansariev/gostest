<?php
    namespace models\common;
    use core\engine\Model;

    class Language extends Model
    {
        public function getLanguageList()
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "languages";
            return $this->db->getAllRows($sql);
        }

        public function getLanguageId($lang)
        {
            $sql = "SELECT id AS lang_id FROM " . DB_PREFIX . "languages WHERE link = '" . $lang . "'";
            return $this->db->getRow($sql)['lang_id'];
        }

        public function getLanguageCode($lang)
        {
            $sql = "SELECT code AS lang_code FROM " . DB_PREFIX . "languages WHERE link = '" . $lang . "'";
            return $this->db->getRow($sql)['lang_code'];
        }
    }