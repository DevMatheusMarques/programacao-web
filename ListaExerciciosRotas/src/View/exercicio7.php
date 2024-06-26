<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 7
        </div>
        <p class="mt-3 ms-3">
            Faça um programa em PHP no qual leia um valor em metros e o converta em centímetros.
        </p>
        <form action="/exercicio7" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="valor" class="form-label">Informe um valor em metros:</label>
                <input type="number" class="form-control" id="valor" name="valor" aria-describedby="valor">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Converter</button>
            </div>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>
