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

    public function alterar(Cliente $cliente, int $id)
    {
        try {
            $sql = 'UPDATE cliente SET nome = :nome, cpf = :cpf, telefone = :telefone where id = :id';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            $p->bindValue(':nome', $cliente->getNome());
            $p->bindValue(':cpf', $cliente->getCpf());
            $p->bindValue(':telefone', $cliente->getTelefone());
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao alterar no banco de dados: " . $exception->getMessage();
        }
    }

    public function excluir($id)
    {
        try{
            $sql = 'delete from cliente where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao excluir no banco de dados" . $exception->getMessage();
        }
    }

    public function getAll()
    {
        $sql = 'select * from cliente ';
        $p = $this->conexao->getConexao()->query($sql);
        $row = $p->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function getId($id)
    {
        try{
            $sql = 'select * from cliente where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            $p->execute();
            $row = $p->fetch(\PDO::FETCH_ASSOC);
            return $row;
        } catch (\Exception $exception) {
            return "Erro ao pegar dados no banco." . $exception->getMessage();
        }
    }
}