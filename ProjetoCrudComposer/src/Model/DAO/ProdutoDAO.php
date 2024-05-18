<?php

namespace Php\Primeiroprojeto\Model\DAO;

use Php\Primeiroprojeto\Model\Domain\Produto;

class ProdutoDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Produto $produto) {
        $sql = 'insert into produto (nome, quantidade, valor, categoria_id) values (:nome, :quantidade, :valor, :categoria_id)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $produto->getNome());
        $p->bindValue(':quantidade', $produto->getQuantidade());
        $p->bindValue(':valor', $produto->getValor());
        $p->bindValue(':categoria_id', $produto->getCategoriaId());
        return $p->execute();
    }

    public function alterar(Produto $produto)
    {
        try{
            $sql = 'UPDATE produto SET nome = :nome, quantidade = :quantidade, valor = :valor, categoria_id = :categoria_id';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':nome', $produto->getNome());
            $p->bindValue(':quantidade', $produto->getQuantidade());
            $p->bindValue(':valor', $produto->getValor());
            $p->bindValue(':categoria_id', $produto->getCategoriaId());
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao alterar no banco de dados";
        }
    }

    public function excluir(Produto $produto)
    {
        try{
            $sql = 'delete from produto where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $produto);
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao excluir no banco de dados";
        }
    }

    public function getAll()
    {
        $sql = 'select * from produto ';
        $p = $this->conexao->getConexao()->query($sql);
        $row = $p->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function getId($id)
    {
        try{
            $sql = 'select * from produto where id = :id;';
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