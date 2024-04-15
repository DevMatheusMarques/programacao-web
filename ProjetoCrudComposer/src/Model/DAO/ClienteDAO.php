<?php

namespace Php\Primeiroprojeto\Model\DAO;

use Php\Primeiroprojeto\Model\Domain\Cliente;

class ClienteDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Cliente $cliente): bool
    {
        $sql = 'insert into cliente (nome, cpf, telefone) values (:nome, :cpf, :telefone)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $cliente->getNome());
        $p->bindValue(':cpf', $cliente->getCpf());
        $p->bindValue(':telefone', $cliente->getTelefone());
        return $p->execute();
    }
}