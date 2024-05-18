<?php

/**@var array $id */

$clienteDao = new \Php\Primeiroprojeto\Model\DAO\ClienteDAO;
$idInt = intval($id[1]);

$cliente = $clienteDao->getId($idInt);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<main>
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Alterar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/cliente/alterar/novo" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $cliente['id']?>">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Informe o nome atualizado do cliente:</label>
                            <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" value="<?= $cliente['nome']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control bg-secondary-subtle" id="cpf" name="cpf" aria-describedby="cpf" value="<?= $cliente['cpf']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" aria-describedby="telefone" value="<?= $cliente['telefone']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<footer></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>