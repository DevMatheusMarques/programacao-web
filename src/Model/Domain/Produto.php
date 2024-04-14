<?php

namespace Php\Primeiroprojeto\Model\Domain;

class Produto
{
//    private $id;
    protected string $nome;
    protected float $valor;
    protected int $categoria_id;


    public function __construct($nome, $valor, $categoria_id)
    {
        $this->setNome($nome);
        $this->setValor($valor);
        $this->setCategoriaId($categoria_id);
    }

    /**
     * @return int
     */
    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * @param int $categoria_id
     */
    public function setCategoriaId(int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @param float $valor
     */
    public function setValor(float $valor): void
    {
        $this->valor = $valor;
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