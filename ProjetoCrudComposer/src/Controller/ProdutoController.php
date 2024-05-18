<?php

namespace Php\Primeiroprojeto\Controller;

use Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
use Php\Primeiroprojeto\Model\Domain\Categoria;
use Php\Primeiroprojeto\Model\Domain\Produto;

class ProdutoController
{
    public function inserir() {
        require_once '..\src\View\Produto\inserir-produto.php';
    }

    public function novo() {

        $produto = new Produto(
            $_POST['nome'],
            $_POST['quantidade'],
            $_POST['valor'],
            $_POST['categoria_id']
        );


        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($produto)){
            return '<script> alert("Produto cadastrado com sucesso")</script>';
        } else {
            return '<script> alert("Erro ao cadastrar produto!")</script>';
        }
    }

    public function exibir() {
        $produtoDAO = new ProdutoDAO();

        if ($produtoDAO->getAll()) {
            require_once '../src/View/Produto/exibir-produto.php';
        } else {
            return '<script> alert("Erro ao encontrar dados!")</script>';
        }
    }
}