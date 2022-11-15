<?php
require_once './libs/Router.php'; 
require_once './Controller/ProductApiController.php';
require_once './Controller/UsersApiController.php';
//require_once './APIController.php';



    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("/products", "GET", "ProductApiController", "getProducts");
    $router->addRoute("/products/:ID", "GET", "ProductApiController", "getProduct");
    $router->addRoute("/products/:ID/:COLS", "GET", "ProductApiController", "getProduct");
    $router->addRoute("/products", "POST", "ProductApiController", "createProduct");        
    $router->addRoute("/products/:ID", "PUT", "ProductApiController", "updateProduct");
    $router->addRoute("/products/:ID", "DELETE", "ProductApiController", "deleteProduct");
    $router->addRoute("/users/token", "GET", "UsersApiController", "getToken");
    


    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
