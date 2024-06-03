<?php

require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../dao/BaseDao.class.php"; 
require_once __DIR__ . "/../../jwt_helper.php"; 

Flight::route('POST /register', function(){
    
    $baseDao = new BaseDao('doctor');

    $name = Flight::request()->data['name'];
    $email = Flight::request()->data['email'];
    $username = Flight::request()->data['username'];
    $password = Flight::request()->data['password'];

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    $doctorData = [
        'name' => $name,
        'email' => $email,
        'username' => $username,
        'password' => $hashedPassword
        
    ];

    
    $doctor = $baseDao->insert($doctorData);

    
});

Flight::route('POST /login', function(){
    $baseDao = new BaseDao('doctor');

    // Get username and password from the request
    $username = Flight::request()->data['username'];
    $password = Flight::request()->data['password'];

    // Retrieve user record from the database based on the provided username
    $userRecord = $baseDao->query_unique("SELECT * FROM doctor WHERE username = :username", ['username' => $username]);

    if ($userRecord) {
        // Verify if the provided password matches the hashed password stored in the database
        if (password_verify($password, $userRecord['password'])) {
            // Passwords match, user is authenticated

            // Generate JWT token
            $jwtToken = generateJWT($userRecord['id'], $userRecord['username']);

            // Return the JWT token in the response
            Flight::json(['token' => $jwtToken]);
        } else {
            // Passwords do not match
            Flight::halt(401, 'Invalid username or password.');
        }
    } else {
        // User with the provided username not found
        Flight::halt(404, 'User not found.');
    }
});



