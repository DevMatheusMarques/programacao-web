<?php

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

$categoriaController = new \Php\Primeiroprojeto\Controller\CategoriaController();

$produtoController = new \Php\Primeiroprojeto\Controller\ProdutoController();

$fornecedorController = new \Php\Primeiroprojeto\Controller\FornecedorController();

$clienteController = new \Php\Primeiroprojeto\Controller\ClienteController();

$router->get('/categoria/inserir', [$categoriaController, 'inserir']);

$router->post('/categoria/novo', [$categoriaController, 'novo']);

$router->get('/produto/inserir', [$produtoController, 'inserir']);

$router->post('/produto/novo', [$produtoController, 'novo']);

$router->get('/fornecedor/inserir', [$fornecedorController, 'inserir']);

$router->post('/fornecedor/novo', [$fornecedorController, 'novo']);

$router->get('/cliente/inserir', [$clienteController, 'inserir']);

$router->post('/cliente/novo', [$clienteController, 'novo']);

#Rotas

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($router->getParams());


