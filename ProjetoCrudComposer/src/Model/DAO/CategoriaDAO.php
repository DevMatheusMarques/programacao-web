<?php

namespace Php\Primeiroprojeto\Model\DAO;

use PDO;
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

    public function alterar(Categoria $categoria, int $id)
    {
        try{
            $sql = 'update categoria set nome = :nome where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':nome', $categoria->getNome());
            $p->bindValue(':id', $id);
            return $p->execute();
        } catch (\Exception $exception) {
            return "Erro ao alterar no banco de dados" . $exception->getMessage();
        }
    }

    public function excluir($id)
    {
        try{
            $sql = 'delete from categoria where id = :id;';
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
        $sql = 'select * from categoria ';
        $p = $this->conexao->getConexao()->query($sql);
        $row = $p->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function getId(int $id)
    {
        try{
            $sql = 'select * from categoria where id = :id;';
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':id', $id);
            $p->execute();
            $row = $p->fetch(\PDO::FETCH_ASSOC);
            return $row;
        } catch (\Exception $exception) {
            return "Erro ao pegar dados no banco." . $exception->getMessage();
        }
    }

    public function search($query) {
        $sql = 'SELECT * FROM categoria WHERE nome LIKE :query';
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute(['query' => '%' . $query . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}