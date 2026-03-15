<?php
session_start();
require 'connection.php';
require 'function.php';
require 'controllers/auth.php';

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$route = [
    '/Lordwynx/router' => 'controllers/login.php',
    '/Lordwynx/search_record' => 'controllers/search_record.php',
    '/Lordwynx/update_record' => 'controllers/update_record.php',
    '/Lordwynx/delete_record' => 'controllers/delete_record.php',
    '/Lordwynx/add_record' => 'controllers/add_record.php',
    '/Lordwynx/logout' => 'controllers/logout.php',
];

if(array_key_exists($path, $route)){
    require $route[$path];
}
else{
    http_response_code(404);
    echo "Page not found.";
}
