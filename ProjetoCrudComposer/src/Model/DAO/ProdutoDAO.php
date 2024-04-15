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
        $sql = 'insert into produto (nome, valor, categoria_id) values (:nome, :valor, :categoria_id)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $produto->getNome());
        $p->bindValue(':valor', $produto->getValor());
        $p->bindValue(':categoria_id', $produto->getCategoriaId());
        return $p->execute();
    }

    public function getAll()
    {
        $sql = 'select * from produto ';
        $p = $this->conexao->getConexao()->query($sql);

        $row = $p->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
}