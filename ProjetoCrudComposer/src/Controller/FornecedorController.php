<?php

namespace Php\Primeiroprojeto\Controller;

use Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
use Php\Primeiroprojeto\Model\Domain\Fornecedor;

class FornecedorController
{
    public function inserir() {
        require_once '..\src\View\Fornecedor\inserir-fornecedor.php';
    }

    public function novo()
    {
        $fornecedor = new Fornecedor(
            $_POST['nome'],
            $_POST['cnpj'],
            $_POST['endereco'],
            $_POST['telefone'],
            $_POST['produto_id'],
            $_POST['categoria_id'],
        );


        $fornecedorDAO = new FornecedorDAO();
        if ($fornecedorDAO->inserir($fornecedor)){
            return '<script> alert("Fornecedor cadastrado com sucesso")</script>';
        } else {
            return '<script> alert("Erro ao cadastrar fornecedor!")</script>';
        }
    }

    public function exibir() {
        $fornecedorDAO = new FornecedorDAO();

        if ($fornecedorDAO->getAll()) {
            require_once '../src/View/Fornecedor/exibir-fornecedor.php';
        } else {
            return '<script> alert("Erro ao encontrar dados!")</script>';
        }
    }
}