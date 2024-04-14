<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 1
        </div>
        <p class="mt-3 ms-3">
            Crie um algoritmo que receba um número digitado pelo usuário e verifique se esse valor é positivo,
            negativo ou igual a zero. A saída deve ser: "Valor Positivo", "Valor Negativo" ou "Igual a Zero".
        </p>
        <form action="/exercicio1" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="numero" class="form-label">Informe um número:</label>
                <input type="number" class="form-control" id="numero" name="numero" aria-describedby="numero">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Verificar</button>
            </div>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>

<?php

$numero = $_POST['numero'];

if($numero > 0) {
    echo '<script>alert("Valor Positivo")</script>';
} elseif ($numero == 0) {
    echo '<script>alert("Valor Igual a Zero")</script>';
}
elseif ($numero < 0) {
    echo '<script>alert("Valor Negativo")</script>';
}

?>
