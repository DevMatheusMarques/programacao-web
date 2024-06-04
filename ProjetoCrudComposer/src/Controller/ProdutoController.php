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
            $_POST['categoria_nome'],
            $_POST['fornecedor_nome']
        );


        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($produto)){
            header("Location: /produto?inserir=true");
        } else {
            header("Location: /produto?inserir=false");
        }
    }

    public function consultar($id) {
        require_once '../src/View/Produto/consultar-produto.php';
    }

    public function exibir() {
        $produtoDAO = new ProdutoDAO();

        if ($produtoDAO->getAll()) {
            require_once '../src/View/Produto/exibir-produto.php';
        } else {
            require_once '../src/View/Produto/exibir-produto.php';
        }
    }

    public function alterar($id)
    {
        require_once '../src/View/Produto/alterar-produto.php';
    }

    public function alterarNovo()
    {
//        echo '<pre>';
//        echo 'hi';
//        var_dump($_POST['nome'], $_POST['quantidade'], $_POST['valor'], $_POST['categoria_id'], $_POST['fornecedor_id'], $_POST['id']);
//        echo '</pre>';
//        die();
        $id = $_POST['id'];
        $produto = new Produto($_POST['nome'], $_POST['quantidade'], $_POST['valor'], $_POST['categoria_id'], $_POST['fornecedor_id']);

//        echo '<pre>';
//        var_dump($produto);
//        echo '</pre>';
//        die();
        $produtoDAO = new ProdutoDAO();



        if ($produtoDAO->alterar($produto, $id)) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Tem certeza?",
                    text: "Deseja alterar os dados deste produto?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, alterar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Alterado!",
                            text: "Dados do produto alterados com sucesso.",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "/produto?alterar=true";
                        });
                    } else {
                        window.location.href = "/produto/alterar/'.$id.'";
                    }
                });
            });
          </script>';
            exit();
        } else {
            echo '<script> 
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Ops...",
                    text: "Erro ao alterar dados do produto",
                }).then(function() {
                    window.location.href = "/produto/alterar/'.$id.'";
                });
            });
          </script>';
            exit();
            }
        }

    public function excluir($id)
    {

        $idInt = intval($id[1]);
        $produtoDAO = new ProdutoDAO();
        $result = $produtoDAO->excluir($idInt);

        if ($result) {
            header("Location: /produto?excluir=true");
            exit();
        } else {
            header("Location: /produto?excluir=false");
            exit();
        }
    }
}