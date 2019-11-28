<?php
    namespace models\modules;
    use core\engine\Model;

    class OwlGallery extends Model
    {
        public function getImages()
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "owl_gallery";
            return $this->db->getAllRows($sql);
        }
    }