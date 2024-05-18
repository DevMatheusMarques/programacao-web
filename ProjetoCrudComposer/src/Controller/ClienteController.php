<?php

namespace Php\Primeiroprojeto\Controller;
use Php\Primeiroprojeto\Model\DAO\ClienteDAO;
use Php\Primeiroprojeto\Model\Domain\Cliente;

class ClienteController
{
    public function inserir()
    {
        require_once '..\src\View\Cliente\inserir-cliente.php';
    }

    public function novo()
    {
        $cliente = new Cliente(
            $_POST['nome'],
            $_POST['cpf'],
            $_POST['telefone'],
        );

        $clienteDAO = new ClienteDAO();
        if ($clienteDAO->inserir($cliente)){
            return '<script> alert("Cliente cadastrado com sucesso")</script>';
        } else {
            return '<script> alert("Erro ao cadastrar cliente!")</script>';
        }
    }

    public function exibir() {
        $clienteDAO = new ClienteDAO();

        if ($clienteDAO->getAll()) {
            require_once '../src/View/Cliente/exibir-cliente.php';
        } else {
            return '<script> alert("Erro ao encontrar dados!")</script>';
        }
    }

    public function alterar($id)
    {
        require_once '../src/View/Cliente/alterar-cliente.php';
    }

    public function alterarNovo()
    {
        $id = $_POST['id'];
        $cliente = new Cliente($_POST['nome'], $_POST['cpf'], $_POST['telefone']);
        $clienteDAO = new ClienteDAO();

        if ($clienteDAO->alterar($cliente, $id)) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Tem certeza?",
                    text: "Deseja alterar os dados deste cliente?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, alterar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Alterado!",
                            text: "Dados do cliente alterados com sucesso.",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "/cliente?alterar=true";
                        });
                    } else {
                        window.location.href = "/cliente/alterar/'.$id.'";
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
                    text: "Erro ao alterar dados do cliente",
                }).then(function() {
                    window.location.href = "/cliente/alterar/'.$id.'";
                });
            });
          </script>';
            exit();
        }
    }

    public function excluir($id)
    {

        $idInt = intval($id[1]);
        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->excluir($idInt);

        if ($result) {
            echo '<script> alert("Cliente excluído com sucesso")</script>';
            header("Location: /cliente?excluir=true");
            exit();
        } else {
            echo '<script> alert("Erro ao excluir cliente!")</script>';
            header("Location: /cliente?excluir=false");
            exit();
        }
    }
}