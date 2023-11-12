<?php
use Bramus\Router\Router;

$router = new Router();
$router->get('/mahasiswa', function () {
    header("Location: http://localhost/jsdemo/mahasiswa/list");
});
$router->get('/mahasiswa/list', function () {
    include 'list.php';
});
$router->get('/mahasiswa/add', function () {
    include 'add.php';
});
$router->post('/mahasiswa/insert', function () use ($conn) {
    // Get data from the form or request
    include('insert.php');
});
$router->get('/mahasiswa/edit/(\d+)', function ($id) {
    // Fetch Mahasiswa data based on the ID from the database
    include('edit.php');
});
$router->post('/mahasiswa/update', function () use ($conn) {
    // Get data from the form or request
    include('update.php');
});
// Run the router
$router->run();
?>