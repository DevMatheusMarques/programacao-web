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
        $sql = 'insert into fornecedor (nome, cnpj, endereco, telefone, produto_id, categoria_id) values (:nome, :cnpj, :endereco, :telefone, :produto_id, :categoria_id)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $fornecedor->getNome());
        $p->bindValue(':cnpj', $fornecedor->getCnpj());
        $p->bindValue(':endereco', $fornecedor->getEndereco());
        $p->bindValue(':telefone', $fornecedor->getTelefone());
        $p->bindValue(':produto_id', $fornecedor->getProdutoId());
        $p->bindValue(':categoria_id', $fornecedor->getCategoriaId());
        return $p->execute();
    }

    public function alterar(Fornecedor $fornecedor)
    {
        try{
            $sql = 'UPDATE fornecedor SET nome = :nome, cnpj = :cnpj, telefone = :telefone, produto_id = :produto_id, categoria_id = :categoria_id';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':nome', $fornecedor->getNome());
            $p->bindValue(':cnpj', $fornecedor->getCnpj());
            $p->bindValue(':endereco', $fornecedor->getEndereco());
            $p->bindValue(':telefone', $fornecedor->getTelefone());
            $p->bindValue(':produto_id', $fornecedor->getProdutoId());
            $p->bindValue(':categoria_id', $fornecedor->getCategoriaId());
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao alterar no banco de dados";
        }
    }

    public function excluir(Fornecedor $fornecedor)
    {
        try{
            $sql = 'delete from fornecedor where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $fornecedor);
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao excluir no banco de dados";
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