<?php
/**@var array $id*/

$fornecedorDao = new \Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
$idInt = intval($id[1]);

$fornecedor = $fornecedorDao->getId($idInt);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Fornecedor</title>
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
            Fornecedor: <?= $fornecedor['nome']; ?>
        </div>
        <form action="/fornecedor/alterar/novo" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $fornecedor['id']?>">
                <div class="col-5 ">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" value="<?= $fornecedor['nome']; ?>" disabled>
                    <label for="cnpj" class="form-label mt-3">CNPJ:</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" aria-describedby="cnpj" value="<?= $fornecedor['cnpj']; ?>" disabled>
                </div>
                <div class="col-5">
                    <label for="endereco" class="form-label mt-3">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="endereco" value="<?= $fornecedor['endereco']; ?>" disabled>
                    <label for="telefone" class="form-label mt-3">Telefone:</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" aria-describedby="telefone" value="<?= $fornecedor['telefone']; ?>"disabled>
                </div>
            </div>
        </form>
    </div>
    <a href="/fornecedor" class="btn bg-info-subtle mt-5 mb-5" style="margin-left: 8%;">Voltar</a>
</main>
<footer></footer>
</body>
</html>