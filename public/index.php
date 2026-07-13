<?php

session_start();

const BASE_PATH = __DIR__ . '/../';
  
require BASE_PATH .'Core/functions.php';

spl_autoload_register(function ($class){
 $class = str_replace('\\', DIRECTORY_SEPARATOR,$class);

 require base_path("{$class}.php");
 
});

require base_path('bootstrap.php');

// require base_path('Core/Router.php');
$router = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// $method = $_SERVER['REQUEST_METHOD'];
$router->route($uri,$method);



// $id = $_GET['id'];
// $query = "select * from posts where id = :id";
// $posts = $db->query($query, ['id'=>$id])->fetch();



// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
