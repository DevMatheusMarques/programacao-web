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
        $sql = 'insert into fornecedor (nome, endereco, telefone, produto_id, categoria_id) values (:nome, :endereco, :telefone, :produto_id, :categoria_id)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $fornecedor->getNome());
        $p->bindValue(':endereco', $fornecedor->getEndereco());
        $p->bindValue(':telefone', $fornecedor->getTelefone());
        $p->bindValue(':produto_id', $fornecedor->getProdutoId());
        $p->bindValue(':categoria_id', $fornecedor->getCategoriaId());
        return $p->execute();
    }
}