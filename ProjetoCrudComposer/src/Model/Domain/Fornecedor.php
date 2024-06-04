<?php

namespace Php\Primeiroprojeto\Model\Domain;

class Fornecedor
{
    protected string $nome;
    protected string $cnpj;
    protected string $endereco;
    protected string $telefone;

    public function __construct($nome, $cnpj, $endereco, $telefone)
    {
        $this->setNome($nome);
        $this->setCnpj($cnpj);
        $this->setEndereco($endereco);
        $this->setTelefone($telefone);
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
}