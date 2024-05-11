<?php

require_once __DIR__ .'/../../get_doctor_data.php'; 


Flight::route('GET /get_doctor_data', function() {
    

    $results = get_doctor_data();

    
    Flight::json($results);
});