<?php
    namespace models\modules;
    use core\engine\Model;

    class News extends Model
    {
        public function getList($limit = false, $language_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "news WHERE language_id = " . (int)$language_id . " ORDER BY date_insert DESC";

            if(isset($limit['from']) && isset($limit['notes'])){
                $sql .= " LIMIT " . (int)$limit['from'] . ", " . (int)$limit['notes'];
            }
            else if((int)$limit){
                $sql .= " LIMIT " . (int)$limit;
            }

            return $this->db->getAllRows($sql);
        }

        public function getOneArticle($article_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "news WHERE id = " . (int)$article_id;

            return $this->db->getAllRows($sql);
        }

        public function getImagesOfArticle($article_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "news_images WHERE news_id = " . (int)$article_id;
            return $this->db->getAllRows($sql);
        }

        public function getVideosOfArticle($article_id)
        {
            $sql = "SELECT * FROM " . DB_PREFIX . "news_videos WHERE news_id = " . (int)$article_id;
            return $this->db->getAllRows($sql);
        }

        public function getTotalNews()
        {
            $sql = "SELECT COUNT(*) AS count FROM " . DB_PREFIX . "news";
            return $this->db->getRow($sql);
        }
    }