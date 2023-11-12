<?php
require 'vendor/autoload.php';
use Bramus\Router\Router;

function ShowArray($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function getURL(){
    // Get the protocol (http:// or https://)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

// Get the host (e.g., localhost)
$host = $_SERVER['HTTP_HOST'];

// Get the request URI (e.g., /oop/matakuliah/edit/5)
$request_uri = $_SERVER['REQUEST_URI'];

// Combine the parts to create the full URL
$full_url = $protocol . $host . $request_uri;
return $full_url;
}

function getSegment($url,$index){
    
    // Parse the URL
    $parsed_url = parse_url($url);

    // Get the path from the parsed URL
    $path = $parsed_url['path'];

    // Split the path into segments using the slash as a delimiter
    $segments = explode('/', trim($path, '/'));

    // Get the first segment (in this case, "/page")
    $page_segment = isset($segments[$index]) ? $segments[$index] : null;
    return $page_segment;
}

function countSegment($url){
    
    // Parse the URL
    $parsed_url = parse_url($url);

    // Get the path from the parsed URL
    $path = $parsed_url['path'];

    // Split the path into segments using the slash as a delimiter
    $segments = explode('/', trim($path, '/'));

    // Count the number of segments
    $segment_count = count($segments);
    return $segment_count;
}

function getActionURL($url){
    
    $segment = countSegment($url);
    if($segment==4){
        // Parse the URL
        $parsed_url = parse_url($url);
        
        // Get the path from the parsed URL
        $path = $parsed_url['path'];
        
        // Split the path into segments using the slash as a delimiter
        $segments = explode('/', trim($path, '/'));
        
        // Get the segment before the last one
        $val = isset($segments[count($segments) - 2]) ? $segments[count($segments) - 2] : null;

    } else {
        $val = "";
    }

    return $val;
   
}

function BaseURL(){
    // Get the protocol (http:// or https://)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

// Get the host (e.g., localhost)
$host = $_SERVER['HTTP_HOST'];

// Get the request URI (e.g., /oop/matakuliah/edit/5)
$request_uri = $_SERVER['REQUEST_URI'];

// Combine the parts to create the full URL
$full_url = $protocol . $host . $request_uri;
$base = $protocol . $host .'/'. getSegment($full_url,0);
return $base;
}

function handleRoute($routeMap, $actionType) {
    // Get the base URL (e.g., /myapp)
    $base_url = dirname($_SERVER['SCRIPT_NAME']);

    // Get the requested route from the URL (e.g., /about)
    $route = str_replace($base_url, '', $_SERVER['REQUEST_URI']);

    // Use the action type to look up the appropriate route in the map
    $routeKey = $actionType . $route;
    
    if (array_key_exists($routeKey, $routeMap)) {
        // Include the corresponding PHP file
        echo($routeMap[$routeKey]);
        //include($routeMap[$routeKey]);
    } else {
        // Handle 404 Not Found
        http_response_code(404);
        echo "404 - Page not found\n";
    }
}

function OpenPage($viewFile,$id){ 
    $urlWithQuery = $viewFile . '?id=' . $id;
    if (file_exists($viewFile)) {
        include($viewFile);
        
        exit();
    } else {
        header('HTTP/1.0 404 Not Found');
        echo '404 - File not found';
    }
}

function setupRouter($baseRoute, $conn) {
    $router = new Router();
    
    $baseUrl = "http://localhost/jsdemo"; // Set your base URL here

    $router->get($baseRoute, function () use ($baseRoute, $baseUrl) {
        header("Location: $baseUrl$baseRoute/list");
    });

    $router->get("$baseRoute/list", function () {
        include 'list.php';
    });

    $router->get("$baseRoute/add", function () {
        include 'add.php';
    });

    $router->post("$baseRoute/insert", function () use ($conn) {
        // Get data from the form or request
        include('insert.php');
    });

    $router->get("$baseRoute/edit/(\d+)", function ($id) {
        // Fetch Mahasiswa data based on the ID from the database
        include('edit.php');
    });

    $router->post("$baseRoute/update", function () use ($conn) {
        // Get data from the form or request
        include('update.php');
    });

    return $router;
}
?>