<?php

// Set the reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ (E_NOTICE | E_DEPRECATED));

// Database access credentials
define('DB_NAME', 'Labaratory_management_system');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PASSWORD', '541Lopov@');
define('DB_HOST', '127.0.0.1'); // localhost
define('JWT_SECRET', '1234567890');