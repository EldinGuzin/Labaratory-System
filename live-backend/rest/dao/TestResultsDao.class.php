<?php
require_once __DIR__ . "/BaseDao.class.php"; 

class TestResultsDao extends BaseDao {
    
    public function __construct() {
        parent::__construct("test_results"); 
    }

    public function insert($data) {
        return parent::insert($data);
    }

    public function getAll($id = null) {
        
        $query = "SELECT name, surname, username, hemoglobin, rbc_count, pcv, mcv, tlc, neutrophils, lymphocytes, monocytes, eosinophils, basophils, additional_note FROM test_results";
    
        
        if ($id !== null) {
            $query .= " WHERE id = :id";
        }
    
        
        $results = $this->query($query, [':id' => $id]);
    
        
        return $results;
    }
    
    
    // Add more methods here for other CRUD operations 
}

