<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 10
        </div>
        <p class="mt-3 ms-3">
            Crie uma página em HTML5 na qual a pessoa possa digitar seu peso e sua altura e um programa PHP
            para o cálculo do IMC da pessoa. Defina se a pessoa está acima ou abaixo do peso. Procure referências
            sobre este índice (o que é considerado normal, abaixo ou acima do peso). Inclua a referência (página
            de acesso) para que a pessoa leia sobre este assunto.
        </p>
        <form action="/exercicio10" class="card-body shadow p-3" method="post">
            <div class="mb-3">
                <label for="peso" class="form-label">Informe o peso (em kg):</label>
                <input type="number" class="form-control" id="peso" name="peso" aria-describedby="peso" step="0.01">
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Informe a altura (em metros):</label>
                <input type="number" class="form-control" id="altura" name="altura" aria-describedby="altura" step="0.01">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Calcular IMC</button>
            </div>
        </form>
        <div id="resposta"></div>
    </div>
</main>
<footer></footer>
</body>
</html>

