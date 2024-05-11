<?php

require_once __DIR__ .'/../../get_forum_data.php'; 


Flight::route('GET /get_forum_data', function() {
    

    $results = get_forum_data();

    
    Flight::json($results);
});