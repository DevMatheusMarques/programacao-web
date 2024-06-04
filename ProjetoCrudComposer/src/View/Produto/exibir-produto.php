<?php

$produtoDao = new \Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
$produtos = $produtoDao->getAll();

if (isset($_GET['inserir']) && $_GET['inserir']) {
    echo '
<script>
document.addEventListener("DOMContentLoaded", function () {
    Swal.fire({
        icon: "success",
        title: "Concluído",
        text: "Produto cadastrado com sucesso",
    }).then(function() {
        window.location.href = "/produto";
    });
});
</script>';
}
if (isset($_GET['inserir']) && !$_GET['inserir']) {
    echo '
<script>
document.addEventListener("DOMContentLoaded", function () {
    Swal.fire({
        icon: "error",
        title: "Ops...",
        text: "Erro ao cadastrar produto",
    }).then(function() {
        window.location.href = "/produto";
    });
});
</script>';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exibir Produtos</title>
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
                <th scope="col">Categoria do Produto</th>
                <th scope="col">Fornecedor</th>
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
                <td><?= $produto['categoria_nome']; ?></td>
                <td><?= $produto['fornecedor_nome']; ?></td>
                <td>
                    <a href="/produto/consultar/<?= $produto['id']; ?>"><i class="fa-solid fa-magnifying-glass"></i></a>
<!--                    <a href="/produto/alterar/--><?php //= $produto['id']; ?><!--" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="fa-solid fa-pencil"-->
<!--                                                                                                                              style="color: #cff4fc;"></i></a>-->
                    <a href="/categoria/alterar/<?= $produto['id']; ?>"><i class="fa-solid fa-pencil me-5"
                                                                           style="color: #cff4fc;"></i></a>
                    <form action="/produto/excluir/<?= $produto['id']; ?>" method="post" class="col"
                          id="<?= $produto['id']; ?>"
                    >
                        <a role="button" type="submit"
                           id="<?= $produto['id']; ?>"
                        >
                            <i class="fa-solid fa-trash-can" style="color: #ff0000; margin: 0;"></i>
                        </a>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<footer></footer>
<script>
    const btnSubmit = document.querySelectorAll('a[type="submit"]');
    btnSubmit.forEach((btn) => {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            Swal.fire({
                title: "Tem certeza?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Excluído!",
                        text: "Produto excluído com sucesso.",
                        icon: "success"
                    }).then(() => {
                        const form = btn.closest('form');
                        form.submit();
                    });
                }
            });
        });
    });
</script>
</body>
</html>
