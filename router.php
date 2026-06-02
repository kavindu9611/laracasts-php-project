<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
   '/laracasts-php-project/'  => 'controllers/index.php',
   '/laracasts-php-project/about' => 'controllers/about.php',
    '/laracasts-php-project/notes' => 'controllers/notes.php',
     '/laracasts-php-project/note' => 'controllers/note.php',
   '/laracasts-php-project/contact' => 'controllers/contact.php'
];

function routeToController($uri, $routes){
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    }else{
        abort();
    }
}

function abort($code = 404){
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

if(array_key_exists($uri,$routes)){
    require $routes[$uri];
}else{
    abort();
} 

routeToController($uri, $routes);