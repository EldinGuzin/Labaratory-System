<?php

require_once __DIR__ . '/config.php'; 

use \Firebase\JWT\JWT;


// Helper function to generate JWT token
function generateJWT($userId, $username) {
    $tokenId    = base64_encode(random_bytes(32));
    $issuedAt   = time();
    $notBefore  = $issuedAt;  
    $expire     = $notBefore + 3600; 

    $payload = [
        'iat'  => $issuedAt,
        'jti'  => $tokenId,
        'iss'  => $_SERVER['SERVER_NAME'],
        'nbf'  => $notBefore,
        'exp'  => $expire,
        'data' => [
            'user_id'  => $userId,
            'username' => $username
        ]
    ];

    
    $jwtToken = JWT::encode($payload, JWT_SECRET, 'HS256');
    return $jwtToken;
}


