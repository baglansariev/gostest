<?php
    namespace models\modules;
    use core\engine\Model;

    class SimpleSlider extends Model
    {
        public function getSliderData()
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "simple_slider ORDER BY sort";
            return $this->db->getAllRows($sql);
        }
    }