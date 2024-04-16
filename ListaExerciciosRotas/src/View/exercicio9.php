<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 9
        </div>
        <p class="mt-3 ms-3">
            Faça um script PHP que receba de um formulário HTML5 uma variável com o ano de nascimento de
            uma pessoa, crie uma constante com o ano atual, calcule e mostre:
            a. a idade dessa pessoa em anos;
            b. quantos dias esta pessoa já viveu;
            c. quantos anos essa pessoa terá em 2025
        </p>
        <form action="/exercicio9" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="ano" class="form-label">Informe o ano de nascimento:</label>
                <input type="number" class="form-control" id="ano" name="ano" aria-describedby="ano">
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
