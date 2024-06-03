<?php

require_once __DIR__ . "/../../jwt_helper.php";
require_once __DIR__ . "/../../config.php";
 
Flight::map('jwt', function($token) {
    $decoded = decodeJWT($token);
    if (!$decoded) {
        Flight::halt(401, json_encode(['error' => 'Unauthorized']));
    }
    return $decoded;
});

Flight::before('start', function(&$params, &$output) {
    $route = Flight::request()->url;

    // Define routes that do not require authentication
    $public_routes = ['/register', '/login'];

    if (!in_array($route, $public_routes)) {
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
            $decoded = Flight::jwt($token); // Validate the token
            Flight::set('user', $decoded->data); // Store the decoded data
        } else {
            Flight::halt(401, json_encode(['error' => 'Unauthorized']));
        }
    }
});
