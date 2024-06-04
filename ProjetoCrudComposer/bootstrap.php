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

//Categoria

$router->get('/categoria/consultar/{id}', [$categoriaController, 'consultar']);

$router->get('/categoria', [$categoriaController, 'exibir']);

$router->get('/categoria/inserir', [$categoriaController, 'inserir']);

$router->post('/categoria/inserir/novo', [$categoriaController, 'inserirNovo']);

$router->get('/categoria/alterar/{id}', [$categoriaController, 'alterar']);

$router->post('/categoria/alterar/novo', [$categoriaController, 'alterarNovo']);

$router->post('/categoria/excluir/{id}', [$categoriaController, 'excluir']);

//Produto

$router->get('/produto/consultar/{id}', [$produtoController, 'consultar']);

$router->get('/produto', [$produtoController, 'exibir']);

$router->get('/produto/inserir', [$produtoController, 'inserir']);

$router->post('/produto/novo', [$produtoController, 'novo']);

$router->get('/produto/alterar/{id}', [$produtoController, 'alterar']);

$router->post('/produto/alterar/novo', [$produtoController, 'alterarNovo']);

$router->post('/produto/excluir/{id}', [$produtoController, 'excluir']);

//Fornecedor

$router->get('/fornecedor/consultar/{id}', [$fornecedorController, 'consultar']);

$router->get('/fornecedor', [$fornecedorController, 'exibir']);

$router->get('/fornecedor/inserir', [$fornecedorController, 'inserir']);

$router->post('/fornecedor/novo', [$fornecedorController, 'novo']);

$router->get('/fornecedor/alterar/{id}', [$fornecedorController, 'alterar']);

$router->post('/fornecedor/alterar/novo', [$fornecedorController, 'alterarNovo']);

$router->post('/fornecedor/excluir/{id}', [$fornecedorController, 'excluir']);

//Cliente

$router->get('/cliente/consultar/{id}', [$clienteController, 'consultar']);

$router->get('/cliente', [$clienteController, 'exibir']);

$router->get('/cliente/inserir', [$clienteController, 'inserir']);

$router->post('/cliente/novo', [$clienteController, 'novo']);

$router->get('/cliente/alterar/{id}', [$clienteController, 'alterar']);

$router->post('/cliente/alterar/novo', [$clienteController, 'alterarNovo']);

$router->post('/cliente/excluir/{id}', [$clienteController, 'excluir']);

#Rotas

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($router->getParams());


