<?php

use Php\Primeiroprojeto\Controller\CategoriaController;
use Php\Primeiroprojeto\Controller\ClienteController;
use Php\Primeiroprojeto\Controller\FornecedorController;
use Php\Primeiroprojeto\Controller\ProdutoController;

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

$categoriaController = new CategoriaController();

$produtoController = new ProdutoController();

$fornecedorController = new FornecedorController();

$clienteController = new ClienteController();

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


