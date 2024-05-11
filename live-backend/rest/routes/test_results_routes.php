<?php

require_once __DIR__ .'/../../get_test_results.php'; 

Flight::route('GET /test-results', function() {
    

    $results = get_test_results();

    
    Flight::json($results);
});
