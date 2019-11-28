<?php
    namespace models\modules;
    use core\engine\Model;

    class MainSlide extends Model
    {
        public function getSlide($language_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "main_slide WHERE language_id = " . (int)$language_id;
            return $this->db->getAllRows($sql);
        }

        public function getSlideLinks($slide_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "main_slide_links WHERE slide_id = " . (int)$slide_id;
            return $this->db->getAllRows($sql);
        }
    }