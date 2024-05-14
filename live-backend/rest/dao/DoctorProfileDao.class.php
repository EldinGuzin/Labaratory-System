<?php

require_once __DIR__ . "/BaseDao.class.php";

class DoctorProfileDao extends BaseDao{

    public function __construct(){
        parent::__construct("doctor");
    }

    public function insert($data) {
        return parent::insert($data);
    }

    public function getAll($id = null) {
        
        $query = "SELECT name, email, username FROM doctor";
    
        
        if ($id !== null) {
            $query .= " WHERE id = :id";
        }
    
        
        $results = $this->query($query, [':id' => $id]);
    
        
        return $results;
    }
}


