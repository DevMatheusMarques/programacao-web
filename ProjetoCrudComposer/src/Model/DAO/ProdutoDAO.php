<?php

namespace Php\Primeiroprojeto\Model\DAO;

use Php\Primeiroprojeto\Model\Domain\Produto;

class ProdutoDAO
{
    private Conexao $conexao;

    /**
     * @return Conexao
     */
    public function getConexao(): Conexao
    {
        return $this->conexao;
    }

    /**
     * @param Conexao $conexao
     */
    private function setConexao(Conexao $conexao)
    {
        $this->conexao = $conexao;
    }

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
}