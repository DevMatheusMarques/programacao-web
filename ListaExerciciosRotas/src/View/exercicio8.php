<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 8
        </div>
        <p class="mt-3 ms-3">
            Faça um programa em PHP para uma loja de tintas. O programa deverá pedir o tamanho em metros
            quadrados da área a ser pintada. Considere que a cobertura da tinta é de 1 litro para cada 3 metros
            quadrados e que a tinta é vendida em latas de 18 litros, que custam R$ 80,00. Informe ao usuário a
            quantidades de latas de tinta a serem compradas e o preço total.
        </p>
        <form action="/exercicio8" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="tamanho" class="form-label">Informe o tamanho em metros quadrados da área a ser pintada:</label>
                <input type="number" class="form-control" id="tamanho" name="tamanho" aria-describedby="tamanho">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Calcular</button>
            </div>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>
