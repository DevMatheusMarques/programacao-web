<?php

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

/*$router->get('/olamundo', [$controller, 'olaMundo']);

$router->get('/olapessoa/{nome}', function ($params){
    return 'Olá ' . $params[1];
});

$router->get('/exercicio1/formulario', [$controller, 'formExe1']);
$router->get('/exercicio1/formulario', [$controller, 'formExe1']);

$router->post('/exercicio1/resposta', function (){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $soma = $valor1 + $valor2;
    echo '
<script>
alert("Valor da soma: " + '.$soma.');
window.location.href = "/exercicio1/formulario";
</script>';
});*/

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
/*
if ($result instanceof Closure){

} elseif (is_string($result)){
    $resultado = explode("@", $result);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($router->getParams());
}*/

