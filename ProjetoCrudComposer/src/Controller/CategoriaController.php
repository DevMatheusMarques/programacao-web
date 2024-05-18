<?php

namespace Php\Primeiroprojeto\Controller;

use Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
use Php\Primeiroprojeto\Model\Domain\Categoria;

class CategoriaController
{
    public function inserir()
    {
        require_once '../src/View/Categoria/inserir-categoria.php';
    }

    public function inserirNovo()
    {
        $categoria = new Categoria($_POST['nome']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->inserir($categoria)) {
            header("Location: /categoria?inserir=true");
        } else {
            header("Location: /categoria?inserir=false");
        }
        exit();
    }

    public function exibir()
    {
        $categoriaDAO = new CategoriaDAO();


        if ($categoriaDAO->getAll()) {
            require_once '../src/View/Categoria/exibir-categoria.php';
        } else {
            require_once '../src/View/Categoria/exibir-categoria.php';
        }
    }

    public function alterar($id)
    {
        require_once '../src/View/Categoria/alterar-categoria.php';
    }

    public function alterarNovo()
    {
        $id = $_POST['id'];
        $categoria = new Categoria($_POST['nome']);
        $categoriaDAO = new CategoriaDAO();

        if ($categoriaDAO->alterar($categoria, $id)) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Tem certeza?",
                    text: "Deseja alterar os dados dessa categoria?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, alterar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Alterado!",
                            text: "Dados da categoria alterados com sucesso.",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "/categoria?alterar=true";
                        });
                    } else {
                        window.location.href = "/categoria/alterar/'.$id.'";
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
                    text: "Erro ao alterar categoria",
                }).then(function() {
                    window.location.href = "/categoria/alterar/'.$id.'";
                });
            });
          </script>';
            exit();
        }
    }

    public function excluir($id)
    {

        $idInt = intval($id[1]);
        $categoriaDAO = new CategoriaDAO();
        $result = $categoriaDAO->excluir($idInt);

        if ($result) {
            header("Location: /categoria?excluir=true");
            exit();
        } else {
            header("Location: /categoria?excluir=false");
            exit();
        }
    }
}