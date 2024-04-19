<?php

namespace Php\Primeiroprojeto\Model\DAO;

use PDO;

class Conexao
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = new PDO('mysql:host=localhost; dbname=programacaoweb', 'root', 'admin');
    }

    /**
     * @return mixed
     */
    public function getConexao()
    {
        return $this->conexao;
    }


}