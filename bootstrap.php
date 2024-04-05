<?php

use Php\Primeiroprojeto\Controller\HomeController;

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

$controller = new HomeController();

$router->get('/olamundo', [$controller, 'olaMundo']);

$router->get('/olapessoa/{nome}', function ($params){
    return 'Olá ' . $params[1];
});

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
});


#Rotas

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($router->getParams());

