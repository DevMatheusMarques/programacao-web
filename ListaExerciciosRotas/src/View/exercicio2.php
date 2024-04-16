<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header></header>
<main>
    <div class="card mt-5 mb-5 border border-info-subtle" style="margin-left: 8%; margin-right: 8%;">
        <div class="card-header border border-info-subtle bg-info-subtle">
            Exercício 2
        </div>
        <p class="mt-3 ms-3">
            Escreva um programa que leia 7 números diferentes, imprima o menor valor e imprima a posição do
            menor valor na sequência de entrada.
        </p>
        <form action="/exercicio2" class="card-body shadow p-3" method="post">
            <?php for ($i = 1; $i <= 7; $i++): ?>
                <div class="mb-3">
                    <label for="numero<?php echo $i; ?>" class="form-label">Informe o <?php echo $i; ?>º número:</label>
                    <input type="number" class="form-control" id="numero<?php echo $i; ?>" name="numero<?php echo $i; ?>" aria-describedby="numero<?php echo $i; ?>">
                </div>
            <?php endfor; ?>
            <div class="mb-3">
                <button type="submit" class="btn bg-info-subtle mt-5">Verificar</button>
            </div>
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>
