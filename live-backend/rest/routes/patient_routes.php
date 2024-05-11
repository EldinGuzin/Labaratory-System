<?php

require_once __DIR__ .'/../../get_patient_data.php'; 


Flight::route('GET /get_patient_data', function() {
    

    $results = get_patient_data();

    
    Flight::json($results);
});