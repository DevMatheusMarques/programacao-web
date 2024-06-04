<?php

$categoriaDao = new \Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
$categorias = $categoriaDao->getAll();

if (isset($_GET['inserir']) && $_GET['inserir']) {
    echo '
<script>
document.addEventListener("DOMContentLoaded", function () {
    Swal.fire({
        icon: "success",
        title: "Concluído",
        text: "Categoria cadastrada com sucesso",
    }).then(function() {
        window.location.href = "/categoria";
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
        text: "Erro ao cadastrar categoria",
    }).then(function() {
        window.location.href = "/categoria";
    });
});
</script>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exibir Categoria</title>

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-4FQF50hO33PgtZrnFN0sW/3Ky0b7/SaRfop5Gg9+QyUmU3SjEV7ddSLqRP2D6+d2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Icon -->
    <link rel="icon" href="../../public/assets/book-solid.png" type="image/x-icon">

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
    <a href="categoria/inserir">
        <button type="button" class="btn bg-info-subtle mt-5 mb-2" style="width: 16%; margin-left: 8%;">Cadastrar Nova
            Categoria
        </button>
    </a>

    <div class="card mt-5 mb-5 border border-info-subtle d-flex row" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            <strong>Categorias Cadastradas</strong>
        </div>
        <table class="table" id="table" style="width: 100%">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Categorias</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categorias

                           as $categoria) { ?>
                <tr>
                    <td><?= $categoria['id']; ?></td>
                    <td><?= $categoria['nome']; ?></td>
                    <td>
                        <a href="/categoria/consultar/<?= $categoria['id']; ?>"><i class="fa-solid fa-magnifying-glass me-5"></i></a>
                        <a href="/categoria/alterar/<?= $categoria['id']; ?>"><i class="fa-solid fa-pencil me-5"
                                                                                 style="color: #cff4fc;"></i></a>
                        <form action="/categoria/excluir/<?= $categoria['id']; ?>" method="post" class="col"
                              id="<?= $categoria['id']; ?>"
                        >
                            <a role="button" type="submit"
                               id="<?= $categoria['id']; ?>"
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
    let table = new DataTable('table', {
        // language: {
        //     url: 'cdn.datatables.net/plug-ins/2.0.5/i18n/pt-BR.json',
        // },
    });
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
                        text: "Categoria excluída com sucesso.",
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
