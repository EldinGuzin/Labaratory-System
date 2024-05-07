<?php
require_once __DIR__ . "/BaseDao.class.php";

class AnswersDao extends BaseDao {
    public function __construct() {
        parent::__construct("answers");
    }

    public function getAllAnswers() {
        $query = "SELECT * FROM answers";
        return $this->query($query, []);
    }

    
}
?>
