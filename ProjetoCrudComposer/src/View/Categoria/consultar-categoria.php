<?php
/**@var array $id*/

$categoriaDao = new \Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
$idInt = intval($id[1]);

$categoria = $categoriaDao->getId($idInt);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Categoria</title>
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
            Categoria: <?= $categoria['nome']; ?>
        </div>
        <form action="/categoria/alterar/novo" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $categoria['id']?>">
                <label for="nome" class="form-label">Nome da categoria:</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" value="<?= $categoria['nome']; ?>" disabled>
            </div>
        </form>
    </div>
    <a href="/categoria" class="btn bg-info-subtle mt-5" style="margin-left: 8%;">Voltar</a>
</main>
<footer></footer>
</body>
</html>
