<?php

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

$homeController = new \Php\Primeiroprojeto\Controller\HomeController();

$router->get('/exercicio1', [$homeController, 'ex1']);
$router->post('/exercicio1', [$homeController, 'ex1']);

$router->get('/exercicio2', [$homeController, 'renderizaOExercicio2']);
$router->post('/exercicio2', [$homeController, 'ex2']);


#Rotas

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($router->getParams());


