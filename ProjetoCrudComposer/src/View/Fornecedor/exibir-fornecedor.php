<?php
$fornecedorDao = new \Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
$fornecedores = $fornecedorDao->getAll();

if (isset($_GET['inserir'])) {
    if ($_GET['inserir']) {
        echo '
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: "success",
                    title: "Concluído",
                    text: "Fornecedor cadastrado com sucesso",
                }).then(function() {
                    window.location.href = "/fornecedor";
                });
            });
            </script>';
    } else {
        echo '
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: "error",
                    title: "Ops...",
                    text: "Erro ao cadastrar fornecedor",
                }).then(function() {
                    window.location.href = "/fornecedor";
                });
            });
            </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exibir Fornecedores</title>

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
    <?php require_once '../src/View/Navegacao/Navbar.php'; ?>
</header>
<main>
    <a href="fornecedor/inserir">
        <button type="button" class="btn bg-info-subtle mt-5 mb-2" style="width: 16%; margin-left: 8%;">Cadastrar Novo Fornecedor</button>
    </a>

    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            <strong>Fornecedores Cadastrados</strong>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fornecedores as $fornecedor) { ?>
                <tr>
                    <td><?= $fornecedor['id']; ?></td>
                    <td><?= $fornecedor['nome']; ?></td>
                    <td><?= $fornecedor['cnpj']; ?></td>
                    <td><?= $fornecedor['endereco']; ?></td>
                    <td><?= $fornecedor['telefone']; ?></td>
                    <td>
                        <a href="/fornecedor/consultar/<?= $fornecedor['id']; ?>"><i class="fa-solid fa-magnifying-glass"></i></a>
                        <a href="/fornecedor/alterar/<?= $fornecedor['id']; ?>"><i class="fa-solid fa-pencil" style="color: #cff4fc;"></i></a>
                        <form action="/fornecedor/excluir/<?= $fornecedor['id']; ?>" method="post" class="d-inline">
                            <button type="button" class="btn-delete" data-id="<?= $fornecedor['id']; ?>">
                                <i class="fa-solid fa-trash-can" style="color: #ff0000;"></i>
                            </button>
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
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('form');
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
                    form.submit();
                }
            });
        });
    });
</script>
</body>
</html>

<?php
if (isset($_GET['excluir']) && $_GET['excluir'] == 'true') {
    echo '
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Excluído!",
                text: "Fornecedor excluído com sucesso."
            }).then(function() {
                window.location.href = "/fornecedor";
            });
        });
        </script>';
}

if (isset($_GET['violation'])) {
    echo '
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Ops...",
                text: "Fornecedor possui produto atrelado a ele, por favor exclua os produtos atrelados e tente novamente!"
            }).then(function() {
                window.location.href = "/fornecedor";
            });
        });
        </script>';
}
?>
