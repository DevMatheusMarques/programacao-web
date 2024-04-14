<?php

namespace Php\Primeiroprojeto\Controller;

use Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
use Php\Primeiroprojeto\Model\Domain\Fornecedor;

class FornecedorController
{
    public function inserir($params) {
        require_once '..\src\View\Fornecedor\inserir-fornecedor.php';
    }

    public function novo()
    {
        /*$categoria = new CategoriaDAO();
        $categoriaData = $categoria->getByName($_POST['nome_categoria']);
        */

        $fornecedor = new Fornecedor(
            $_POST['nome'],
            $_POST['endereco'],
            $_POST['telefone'],
            $_POST['produto_id'],
        //$categoriaData['id'],
        );


        $fornecedorDAO = new FornecedorDAO();
        if ($fornecedorDAO->inserir($fornecedor)){
            return '<script> alert("Fornecedor cadastrado com sucesso")</script>';
        } else {
            return '<script> alert("Erro ao cadastrar fornecedor!")</script>';
        }
    }
}