<?php

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Primeiroprojeto\Router($method, $path);

#Rotas

$router->get('/olamundo', function (){
    return "Olá Mundo";
});

$router->get('/olapessoa/{nome}', function ($params){
    return 'Olá ' . $params[1];
});

$router->get('/exercicio1/formulario', function (){
    include("exercicio1.html");
});

$router->post('/exercicio1/resposta', function (){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $soma = $valor1 + $valor2;
    echo '
<script>
alert("Valor da soma: " + '.$soma.');
window.location.href = "/exercicio1/formulario";
</script>';

    return ;

});


#Rotas

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $result($router->getParams());

