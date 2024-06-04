<?php

namespace Php\Primeiroprojeto\Model\Domain;

class Produto
{
    protected string $nome;
    protected int $quantidade;
    protected float $valor;
    protected int $categoria_id;
    protected int $fornecedor_id;

    public function __construct($nome, $quantidade, $valor, $categoria_id, $fornecedor_id)
    {
        $this->setNome($nome);
        $this->setQuantidade($quantidade);
        $this->setValor($valor);
        $this->setCategoriaId($categoria_id);
        $this->setFornecedorId($fornecedor_id);
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
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
     * @return int
     */
    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }

    /**
     * @return int
     */
    public function getFornecedorId(): int
    {
        return $this->fornecedor_id;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
     * @param int $categoria_id
     */
    public function setCategoriaId(int $categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @param int $fornecedor_id
     */
    public function setFornecedorId(int $fornecedor_id): void
    {
        $this->fornecedor_id = $fornecedor_id;
    }
}