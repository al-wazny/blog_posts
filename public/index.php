<?php
// todo this file contains the kickstarter for the entire application
// 1. check the url (e.g. blogs/create) the second component of the url is optional and falls back to "index"
// 2. BlogController is the default because is shows the homepage
// 3. $_REQUEST contains either params for $_GET and $_POST and $_COOKIE
// for debounce/ anti bot spaming
// <input type="text" name="website" style="display:none" autocomplete="off">
// if (!empty($_POST['website'])) {
//    die('Bot detected.');
//}
require __DIR__ . '/../vendor/autoload.php';


// Get the URL path, e.g. `/blog/index` or `/blog`
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove leading/trailing slashes and split by `/`
$segments = array_filter(explode('/', trim($path, '/')));

// Determine controller and method
$controllerSegment = $segments[0] ?? 'blog'; // default to BlogController
$methodSegment     = $segments[1] ?? 'index'; // default to index method

// Build the fully qualified class name
$controllerClass = "BlogPosts\\Controller\\" . ucfirst($controllerSegment) . "Controller";

// Check if the class exists
if (!class_exists($controllerClass)) {
    http_response_code(404);
    echo "Controller $controllerClass not found";
    exit;
}

// Instantiate the controller
$controller = new $controllerClass();

// Check if the method exists
if (!method_exists($controller, $methodSegment)) {
    http_response_code(404);
    echo "Method $methodSegment not found in $controllerClass";
    exit;
}

call_user_func([$controller, $methodSegment], $_REQUEST);
