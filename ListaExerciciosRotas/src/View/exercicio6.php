<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 6
        </div>
        <p class="mt-3 ms-3">
            Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente em relação aos
            seus valores. Caso os valores sejam iguais, informar o usuário e imprimir o valor em tela apenas uma
            vez.
        </p>
        <form action="/exercicio6" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="valorA" class="form-label">Informe o valor de A:</label>
                <input type="number" class="form-control" id="valorA" name="valorA" aria-describedby="valorA">
            </div>
            <div class="mb-3">
                <label for="valorB" class="form-label">Informe o valor de B:</label>
                <input type="number" class="form-control" id="valorB" name="valorB" aria-describedby="valorB">
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