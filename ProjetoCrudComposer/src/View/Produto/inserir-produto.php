<?php

$categoriaDao = new \Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
$categorias = $categoriaDao->getAll();

$fornecedorDao = new \Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
$fornecedores = $fornecedorDao->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserir Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <?php
    require_once '../src/View/Navegacao/Navbar.php'
    ?>
</header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Cadastrar Produto
        </div>
        <form action="/produto/novo" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Informe o nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome">
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Informe a quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" aria-describedby="quantidade">
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Informe o valor do produto:</label>
                <input type="number" step="0.01" class="form-control" id="valor" name="valor" aria-describedby="valor">
            </div>
            <div class="mb-3">
                <label for="categoria_nome" class="form-label">Selecione a categoria do produto:</label><br>
                <select name="categoria_nome" id="categoria_nome" class="form-control" aria-describedby="categoria_nome">>
                    <option selected value="">Escolha uma opção</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id']; ?>"><?= $categoria['nome'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="fornecedor_nome" class="form-label">Selecione o fornecedor do produto:</label>
                <select name="fornecedor_nome" id="fornecedor_nome" class="form-control" aria-describedby="fornecedor_nome">>
                    <option selected value="">Escolha uma opção</option>
                    <?php foreach ($fornecedores as $fornecedor) : ?>
                        <option value="<?= $fornecedor['id']; ?>"><?= $fornecedor['nome'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Cadastrar</button>
            </div>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>