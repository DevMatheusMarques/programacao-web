<?php

namespace Php\Primeiroprojeto\Controller;

use Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Model\Domain\Categoria;

class CategoriaController
{
    public function inserir() {
        require_once '..\src\View\Categoria\inserir-categoria.php';
    }

    public function novo()
    {
        $categoria = new Categoria($_POST['nome']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->inserir($categoria)) {
            return '<script> alert("Categoria cadastrada com sucesso")</script>';
        } else {
            return '<script> alert("Erro ao cadastrar categoria!")</script>';
        }
    }
}