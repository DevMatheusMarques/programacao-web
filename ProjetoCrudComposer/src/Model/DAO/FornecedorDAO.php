<?php

namespace Php\Primeiroprojeto\Model\DAO;

use Php\Primeiroprojeto\Model\Domain\Fornecedor;

class FornecedorDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Fornecedor $fornecedor): bool
    {
        $sql = 'insert into fornecedor (nome, cnpj, endereco, telefone) values (:nome, :cnpj, :endereco, :telefone)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $fornecedor->getNome());
        $p->bindValue(':cnpj', $fornecedor->getCnpj());
        $p->bindValue(':endereco', $fornecedor->getEndereco());
        $p->bindValue(':telefone', $fornecedor->getTelefone());
        return $p->execute();
    }

    public function alterar(Fornecedor $fornecedor, int $id)
    {
        try {
            $sql = 'UPDATE fornecedor SET nome = :nome, cnpj = :cnpj, endereco = :endereco, telefone = :telefone WHERE id = :id';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            $p->bindValue(':nome', $fornecedor->getNome());
            $p->bindValue(':cnpj', $fornecedor->getCnpj());
            $p->bindValue(':endereco', $fornecedor->getEndereco());
            $p->bindValue(':telefone', $fornecedor->getTelefone());
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao alterar no banco de dados: " . $exception->getMessage();
        }
    }

    public function excluir($id)
    {
        try{
            $sql = 'delete from fornecedor where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            return $p->execute();
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                $message = 'violation';
            } else {
                $message = $e->getMessage();
            }
            return $message;
        }
    }

    public function getAll()
    {
        $sql = 'select * from fornecedor ';
        $p = $this->conexao->getConexao()->query($sql);
        $row = $p->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function getId($id)
    {
        try{
            $sql = 'select * from fornecedor where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            $p->execute();
            $row = $p->fetch(\PDO::FETCH_ASSOC);
            return $row;
        } catch (\Exception $exception) {
            return "Erro ao pegar dados no banco.";
        }
    }
}