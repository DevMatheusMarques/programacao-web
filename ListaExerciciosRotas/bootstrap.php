<?php

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

$homeController = new \Php\Primeiroprojeto\Controller\HomeController();

$router->get('/exercicio1', [$homeController, 'ex1']);
$router->post('/exercicio1', [$homeController, 'ex1']);

$router->get('/exercicio2', [$homeController, 'ex2']);
$router->post('/exercicio2', [$homeController, 'ex2']);

$router->get('/exercicio3', [$homeController, 'ex3']);
$router->post('/exercicio3', [$homeController, 'ex3']);

$router->get('/exercicio4', [$homeController, 'ex4']);
$router->post('/exercicio4', [$homeController, 'ex4']);

$router->get('/exercicio5', [$homeController, 'ex5']);
$router->post('/exercicio5', [$homeController, 'ex5']);

$router->get('/exercicio6', [$homeController, 'ex6']);
$router->post('/exercicio6', [$homeController, 'ex6']);

$router->get('/exercicio7', [$homeController, 'ex7']);
$router->post('/exercicio7', [$homeController, 'ex7']);

$router->get('/exercicio8', [$homeController, 'ex8']);
$router->post('/exercicio8', [$homeController, 'ex8']);

$router->get('/exercicio9', [$homeController, 'ex9']);
$router->post('/exercicio9', [$homeController, 'ex9']);

$router->get('/exercicio10', [$homeController, 'ex10']);
$router->post('/exercicio10', [$homeController, 'ex10']);


#Rotas

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($router->getParams());


