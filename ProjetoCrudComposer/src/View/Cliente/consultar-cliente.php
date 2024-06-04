<?php
/**@var array $id*/

$clienteDao = new \Php\Primeiroprojeto\Model\DAO\ClienteDAO;
$idInt = intval($id[1]);

$cliente = $clienteDao->getId($idInt);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cliente: <?= $cliente['nome']; ?></title>
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
            <strong>Cliente: <?= $cliente['nome']; ?></strong>
        </div>
        <form action="/cliente/alterar/novo" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $cliente['id']?>">
                <label for="nome" class="form-label">Informe o nome atualizado do cliente:</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" value="<?= $cliente['nome']; ?>" disabled>
                <label for="cpf" class="form-label mt-3">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="cpf" value="<?= $cliente['cpf']; ?>" disabled>
                <label for="telefone" class="form-label mt-3">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" aria-describedby="telefone" value="<?= $cliente['telefone']; ?>" disabled>
            </div>
        </form>
    </div>
    <a href="/cliente" class="btn bg-info-subtle mt-5" style="margin-left: 8%;">Voltar</a>
</main>
<footer></footer>
</body>
</html>