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

}