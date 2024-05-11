<?php

require_once __DIR__ .'/../../get_test_results.php'; 
require_once __DIR__ .'/../../submit_blood_test.php';

Flight::route('GET /test-results', function() {
    

    $results = get_test_results();

    
    Flight::json($results);
});

Flight::route('POST /submit_blood_test', function() {

    submit_blood_test();

    

});
