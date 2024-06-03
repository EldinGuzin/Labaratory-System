<?php

require_once 'BaseDao.class.php'; 

class SubmitAnswerDao extends BaseDao {
    public function __construct() {
        parent::__construct('answers');
    }

    public function addAnswer($answer) {
        return $this->insert($answer);
    }
}
