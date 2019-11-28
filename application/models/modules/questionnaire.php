<?php
    namespace models\modules;
    use core\engine\Model;

    class Questionnaire extends Model
    {
        public function getQuestionsList($limit = false, $language_id = 1)
        {
            $sql = "SELECT "
                . DB_PREFIX . "questions.id, "
                . DB_PREFIX . "questions.client_name, "
                . DB_PREFIX . "questions.client_phone, "
                . DB_PREFIX . "questions.client_email, "
                . DB_PREFIX . "questions.client_text, "
                . DB_PREFIX . "questions.date_insert AS question_date, "
                . DB_PREFIX . "question_answers.text AS answer 
                FROM " . DB_PREFIX . "questions 
                LEFT JOIN " . DB_PREFIX . "question_answers 
                ON " . DB_PREFIX . "question_answers.question_id = " . DB_PREFIX . "questions.id 
                WHERE status = 'published' AND language_id = " . (int)$language_id . " 
                ORDER BY " . DB_PREFIX . "questions.date_insert DESC";

            if(isset($limit['from']) && isset($limit['notes'])){
                $sql .= " LIMIT " . (int)$limit['from'] . ", " . (int)$limit['notes'];
            }
            else if((int)$limit){
                $sql .= " LIMIT " . (int)$limit;
            }

            return $this->db->getAllRows($sql);
        }

        public function getTotalQuestions()
        {
            $sql = "SELECT COUNT(*) AS count FROM " . DB_PREFIX . "questions WHERE status = 'published'";
            return $this->db->getRow($sql);
        }

        public function setQuestion($client_name, $client_phone, $client_email, $client_text)
        {
            $sql = "INSERT INTO " . DB_PREFIX . "questions SET client_name = '" . $client_name . "', client_phone = '" . $client_phone . "', client_email = '" . $client_email . "', client_text = '" . $client_text . "'";
            $this->db->changeData($sql);
            return true;
        }
    }