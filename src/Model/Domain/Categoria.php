<?php

namespace Php\Primeiroprojeto\Model\Domain;

class Categoria
{
    private $nome;

    public function __construct($nome)
    {
        $this->setNome($nome);
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

}