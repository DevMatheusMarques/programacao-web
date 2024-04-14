<?php

namespace Php\Primeiroprojeto\Model\DAO;

use Php\Primeiroprojeto\Model\Domain\Fornecedor;

class FornecedorDAO
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

    public function inserir(Fornecedor $fornecedor): bool
    {
        $sql = 'insert into fornecedor (nome, endereco, telefone, produto_id) values (:nome, :endereco, :telefone, :produto_id)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $fornecedor->getNome());
        $p->bindValue(':endereco', $fornecedor->getEndereco());
        $p->bindValue(':telefone', $fornecedor->getTelefone());
        $p->bindValue(':produto_id', $fornecedor->getProdutoId());
        return $p->execute();
    }
}