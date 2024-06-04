<?php
/**@var array $id*/

$produtoDao = new \Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
$idInt = intval($id[1]);

$produto = $produtoDao->getId($idInt);

$produtos = $produtoDao->getAll();

$categoriaDao = new \Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
$categorias = $categoriaDao->getAll();

$fornecedorDao = new \Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
$fornecedores = $fornecedorDao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Produto</title>
    <!-- Icon -->
    <link rel="icon" href="./../public/assets/book-solid.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- CDN Data Tables -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

    <script src="https://kit.fontawesome.com/9c74bfc2b8.js" crossorigin="anonymous"></script>
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
            Produto: <?= $produto['nome']; ?>
        </div>
        <form action="/produto/alterar/novo" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $produto['id']?>">
                <div class="col-5 ">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" value="<?= $produto['nome']; ?>" disabled>
                    <label for="quantidade" class="form-label mt-3">Quantidade:</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" aria-describedby="quantidade" value="<?= $produto['quantidade']; ?>" disabled>
                </div>
                <div class="col-5">
                    <label for="valor" class="form-label mt-3">Valor:</label>
                    <input type="text" class="form-control" id="valor" name="valor" aria-describedby="valor" value="<?= $produto['valor']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Selecione a categoria do produto:</label><br>
                    <select name="categoria_id" id="categoria_id" class="form-control" aria-describedby="categoria_id" disabled>
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?= $categoria['id']; ?>" <?= $produto['categoria_id'] == $categoria['id'] ? 'selected' : '' ?>><?= $categoria['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fornecedor_id" class="form-label">Selecione o fornecedor do produto:</label>
                    <select name="fornecedor_id" id="fornecedor_id" class="form-control" aria-describedby="fornecedor_id" disabled>
                        <?php foreach ($fornecedores as $fornecedor) : ?>
                            <option value="<?= $fornecedor['id']; ?>" <?= $produto['fornecedor_id'] == $fornecedor['id'] ? 'selected' : '' ?>><?= $fornecedor['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>
    </div>
    <a href="/produto" class="btn bg-info-subtle mt-5 mb-5" style="margin-left: 8%;">Voltar</a>
</main>
<footer></footer>
</body>
</html>