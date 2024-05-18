<?php

$produtoDao = new \Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
$produtos = $produtoDao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exibir Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-4FQF50hO33PgtZrnFN0sW/3Ky0b7/SaRfop5Gg9+QyUmU3SjEV7ddSLqRP2D6+d2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <?php
    require_once '../src/View/Navegacao/Navbar.php'
    ?>
</header>
<main>
    <a href="produto/inserir"><button type="button" class="btn bg-info-subtle mt-5 mb-2" style="width: 16%; margin-left: 8%;">Cadastrar Novo Produto</button></a>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            <strong>Produtos Cadastrados</strong>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor</th>
                <th scope="col">ID da Categoria do Produto</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td><?= $produto['id']; ?></td>
                <td><?= $produto['nome']; ?></td>
                <td><?= $produto['quantidade']; ?></td>
                <td><?= $produto['valor']; ?></td>
                <td><?= $produto['categoria_id']; ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<footer></footer>
</body>
</html>
