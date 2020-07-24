<?php

require "functions.php";
require "DB.php";
require "models" . DIRECTORY_SEPARATOR . "Book.php";
require "controllers" . DIRECTORY_SEPARATOR . "BookController.php";
require "Router.php";

$uri = explode('?', trim($_SERVER['REQUEST_URI'], '/'))[0];

$router = new Router();
$router->setRoutes(require 'routes.php');

try {
    $router->direct($uri);
} catch(Exception $exception) {
    require '404.error.php';
}
