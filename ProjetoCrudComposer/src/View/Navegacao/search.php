<?php

use Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
use Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
use Php\Primeiroprojeto\Model\DAO\ClienteDAO;

$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare data access objects
$categoriaDao = new CategoriaDAO();
$produtoDao = new ProdutoDAO();
$fornecedorDao = new FornecedorDAO();
$clienteDao = new ClienteDAO();

// Fetch results from each table
$categorias = $categoriaDao->search($query);
$produtos = $produtoDao->search($query);
$fornecedores = $fornecedorDao->search($query);
$clientes = $clienteDao->search($query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <?php require_once '../src/View/Navegacao/Navbar.php'; ?>
</header>
<main class="container mt-5">
    <h2>Resultados da Pesquisa para: <?= htmlspecialchars($query) ?></h2>
    <div class="mt-4">
        <h3>Categorias</h3>
        <ul>
            <?php foreach ($categorias as $categoria) { ?>
                <li><?= htmlspecialchars($categoria['nome']) ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="mt-4">
        <h3>Produtos</h3>
        <ul>
            <?php foreach ($produtos as $produto) { ?>
                <li><?= htmlspecialchars($produto['nome']) ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="mt-4">
        <h3>Fornecedores</h3>
        <ul>
            <?php foreach ($fornecedores as $fornecedor) { ?>
                <li><?= htmlspecialchars($fornecedor['nome']) ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="mt-4">
        <h3>Clientes</h3>
        <ul>
            <?php foreach ($clientes as $cliente) { ?>
                <li><?= htmlspecialchars($cliente['nome']) ?></li>
            <?php } ?>
        </ul>
    </div>
</main>
<footer></footer>
</body>
</html>
