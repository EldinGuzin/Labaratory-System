<?php
require_once __DIR__ . "/BaseDao.class.php";

class QuestionsDao extends BaseDao {
    public function __construct() {
        parent::__construct("questions");
    }

    public function getAllQuestions() {
        $query = "SELECT * FROM questions";
        return $this->query($query, []);
    }

    
}
?>
