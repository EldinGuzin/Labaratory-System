<?php
require_once __DIR__ . "/BaseDao.class.php"; // Include the BaseDao class

class TestResultsDao extends BaseDao {
    // Define methods to interact with the test_results table
    
    public function __construct() {
        parent::__construct("test_results"); // Pass the table name to the parent constructor
    }

    public function insert($data) {
        return parent::insert($data);
    }
    
    // Add more methods here for other CRUD operations if needed
}
?>
