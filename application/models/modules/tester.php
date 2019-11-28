<?php
    namespace models\modules;
    use core\engine\Model;

    class Tester extends Model
    {
        public function getTestList($language_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "laws WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }

        public function setTest()
        {
            //
        }

        public function setTestQuestion()
        {
            //
        }
    }