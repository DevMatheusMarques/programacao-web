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
    public function setConexao(Conexao $conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(Categoria $categoria) {
        $sql = 'insert into categoria (nome) values (:nome)';
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->bindValue(':nome', $categoria->getNome());
        return $p->execute();
    }

    /*public function getByName(string $nomeCategoria)
    {
        try {
            $sql = 'select * from categoria where nome = :nome';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':nome', $nomeCategoria);

            return $p->fetch();
        } catch (\Exception $exception) {
            return 0;
        }
    }*/

    /*public function getAll(string $categorias)
    {
        try {
            $sql = 'select * from categoria where nome = :nome';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':nome', $categorias);

            return $p->fetch();
        } catch (\Exception $exception) {
            return 0;
        }
    }*/

}