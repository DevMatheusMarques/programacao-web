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
        );


        $fornecedorDAO = new FornecedorDAO();
        if ($fornecedorDAO->inserir($fornecedor)){
            header("Location: /fornecedor?inserir=true");
        } else {
            header("Location: /fornecedor?inserir=false");
        }
    }

    public function consultar($id) {
        require_once '../src/View/Fornecedor/consultar-fornecedor.php';
    }

    public function exibir() {
        $fornecedorDAO = new FornecedorDAO();

        if ($fornecedorDAO->getAll()) {
            require_once '../src/View/Fornecedor/exibir-fornecedor.php';
        } else {
            require_once '../src/View/Fornecedor/exibir-fornecedor.php';
        }
    }

    public function alterar($id)
    {
        require_once '../src/View/Fornecedor/alterar-fornecedor.php';
    }

    public function alterarNovo()
    {
//        echo '<pre>';
//        echo 'hi';
//        var_dump($_POST['nome'], $_POST['cnpj'], $_POST['endereco'], $_POST['telefone'], $_POST['id']);
//        echo '</pre>';
//        die();
        $id = $_POST['id'];
        $fornecedor = new Fornecedor($_POST['nome'], $_POST['cnpj'], $_POST['endereco'], $_POST['telefone']);
        $fornecedorDAO = new FornecedorDAO();

//        echo '<pre>';
//        var_dump($fornecedor);
//        echo '</pre>';
//        die();


        if ($fornecedorDAO->alterar($fornecedor, $id)) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Tem certeza?",
                    text: "Deseja alterar os dados deste fornecedor?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, alterar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Alterado!",
                            text: "Dados do fornecedor alterados com sucesso.",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "/fornecedor?alterar=true";
                        });
                    } else {
                        window.location.href = "/fornecedor/alterar/'.$id.'";
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
                    text: "Erro ao alterar dados do fornecedor",
                }).then(function() {
                    window.location.href = "/fornecedor/alterar/'.$id.'";
                });
            });
          </script>';
            exit();
        }
    }

    public function excluir($id)
    {

        $idInt = intval($id[1]);
        $fornecedorDAO = new FornecedorDAO();
        $result = $fornecedorDAO->excluir($idInt);

        if ($result === true) {
            header("Location: /fornecedor?excluir=true");
            exit();
        } else if ($result === 'violation') {
            header("Location: /fornecedor?excluir=false&violation=true");
            exit();
        } else {
            header("Location: /fornecedor?excluir=false");
            exit();
        }
    }
}