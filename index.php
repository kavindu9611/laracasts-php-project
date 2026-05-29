<?php

require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/laracasts-php-project/') {

    require 'controllers/index.php';

} else if ($uri === '/laracasts-php-project/about') {

    require 'controllers/about.php';

} else if ($uri === '/laracasts-php-project/contact') {

    require 'controllers/contact.php';

}