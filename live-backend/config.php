<?php

// Set the reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ (E_NOTICE | E_DEPRECATED));

// Database access credentials
// define('DB_NAME', 'Labaratory_management_system');
// define('DB_PORT', 3306);
// define('DB_USER', 'root');
// define('DB_PASSWORD', '541Lopov@');
// define('DB_HOST', '127.0.0.1'); // localhost
// define('JWT_SECRET', '1234567890');



class Config {
    public static function DB_NAME() {
        return Config::get_env("DB_NAME", "Labaratory_management_system");
    }
    public static function DB_PORT() {
        return Config::get_env("DB_PORT", 3306);
    }
    public static function DB_USER() {
        return Config::get_env("DB_USER", 'root');
    }
    public static function DB_PASSWORD() {
        return Config::get_env("DB_PASSWORD", '541Lopov@');
    }
    public static function DB_HOST() {
        return Config::get_env("DB_HOST", '127.0.0.1');
    }
    public static function JWT_SECRET() {
        return Config::get_env("DB_HOST", ',1234567890');
    }
    public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) != "" ? $_ENV[$name] : $default;
    }
}