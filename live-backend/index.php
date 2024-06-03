<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/rest/dao/TestResultsDao.class.php';

require_once __DIR__ . '/rest/routes/test_results_routes.php';

require_once __DIR__ . '/rest/routes/forum_routes.php';

require_once __DIR__ . '/rest/routes/doctor_routes.php';

require_once __DIR__ . '/rest/routes/patient_routes.php';

require_once __DIR__ . '/rest/routes/auth_routes.php';



Flight::route('*', function(){
    $method = Flight::request()->method;
    $url = Flight::request()->url;
    error_log("Request: $method $url");
});

Flight::start();




