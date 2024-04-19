<?php

$produtoDao = new \Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
$produtos = $produtoDao->getAll();

$categoriaDao = new \Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
$categorias = $categoriaDao->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Cadastrar Fornecedor
        </div>
        <form action="/fornecedor/novo" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Informe o nome do fornecedor:</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome">
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Informe o endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="endereco">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Informe o telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" aria-describedby="telefone">
            </div>
            <div class="mb-3">
                <label for="produto_id" class="form-label">Selecione o produto fornecido:</label>
                <select name="produto_id" id="produto_id" class="form-control" aria-describedby="produto_id">>
                    <option selected value="">Escolha uma opção</option>
                    <?php foreach ($produtos as $produto) : ?>
                        <option value="<?= $produto['id']; ?>"><?= $produto['nome'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Selecione a categoria do produto:</label><br>
                <select name="categoria_id" id="categoria_id" class="form-control" aria-describedby="categoria_id">>
                    <option selected value="">Escolha uma opção</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id']; ?>"><?= $categoria['nome'];?></option>
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