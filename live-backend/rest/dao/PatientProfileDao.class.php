<?php

require_once __DIR__ . "/BaseDao.class.php";

class PatientProfileDao extends BaseDao{

    public function __construct(){
        parent::__construct("patient");
    }

    public function insert($data) {
        return parent::insert($data);
    }

    public function getAll($id = null) {
        
        $query = "SELECT name, surname, email, username FROM patient";
    
        
        if ($id !== null) {
            $query .= " WHERE id = :id";
        }
    
        
        $results = $this->query($query, [':id' => $id]);
    
        
        return $results;
    }
}


