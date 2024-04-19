<?php

namespace Php\Primeiroprojeto\Model\Domain;

class Produto
{
    protected string $nome;
    protected string $quantidade;
    protected float $valor;
    protected int $categoria_id;


    public function __construct($nome, $quantidade, $valor, $categoria_id)
    {
        $this->setNome($nome);
        $this->setQuantidade($quantidade);
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
     * @return int
     */
    public function getQuantidade(): int
    {
        return $this->quantidade;
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
    public function setCategoriaId(int $categoria_id)
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
     * @param int $quantidade
     */
    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
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