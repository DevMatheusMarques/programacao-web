<?php

namespace Php\Primeiroprojeto\Model\DAO;

use Php\Primeiroprojeto\Model\Domain\Categoria;

class CategoriaDAO
{
    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function inserir(Categoria $categoria)
    {
        $sql = 'insert into categoria (nome) values (:nome)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $categoria->getNome());
        return $p->execute();
    }

    public function getAll()
    {
        $sql = 'select * from categoria ';
        $p = $this->conexao->getConexao()->query($sql);

        $row = $p->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

}