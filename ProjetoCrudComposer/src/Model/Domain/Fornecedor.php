<?php

namespace Php\Primeiroprojeto\Model\Domain;

class Fornecedor
{
    protected string $nome;
    protected string $cnpj;
    protected string $endereco;
    protected string $telefone;
    protected int $produto_id;
    protected int $categoria_id;

    public function __construct($nome, $cnpj, $endereco, $telefone, $produto_id, $categoria_id)
    {
        $this->setNome($nome);
        $this->setCnpj($cnpj);
        $this->setEndereco($endereco);
        $this->setTelefone($telefone);
        $this->setProdutoId($produto_id);
        $this->setCategoriaId($categoria_id);
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return string
     */
    public function getEndereco(): string
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return int
     */
    public function getProdutoId(): int
    {
        return $this->produto_id;
    }

    /**
     * @param int $produto_id
     */
    public function setProdutoId(int $produto_id): void
    {
        $this->produto_id = $produto_id;
    }

    /**
     * @return int
     */
    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }

    /**
     * @param int $categoria_id
     */
    public function setCategoriaId(int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }
}