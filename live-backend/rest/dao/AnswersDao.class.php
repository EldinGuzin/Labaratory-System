<?php
require_once __DIR__ . "/BaseDao.class.php";

class AnswersDao extends BaseDao {
    public function __construct() {
        parent::__construct("answers");
    }

    public function getAnswerbyQuestionId($question_id) {
        return $this->query_unique("SELECT * FROM answers WHERE question_id = :question_id", ["question_id" => $question_id]);
    }
    
}

