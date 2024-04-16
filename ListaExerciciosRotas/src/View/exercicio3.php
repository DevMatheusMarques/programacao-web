<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 3
        </div>
        <p class="mt-3 ms-3">
            Escreva um programa para calcular a soma dos dois valores de entrada. Se os dois valores forem
            iguais, retorne o triplo da soma.
        </p>
        <form action="/exercicio3" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Informe o primeiro número:</label>
                <input type="number" class="form-control" id="valor1" name="valor1" aria-describedby="valor1">
            </div>
            <div class="mb-3">
                <label for="valor2" class="form-label">Informe o segundo número:</label>
                <input type="number" class="form-control" id="valor2" name="valor2" aria-describedby="valor2">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Somar</button>
            </div>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>