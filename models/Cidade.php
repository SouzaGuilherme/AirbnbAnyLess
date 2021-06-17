<?php


class Cidade {
    private $codigo_cidade;
    private $uf;
    private $nome;

    public function __construct($codigo_cidade, $uf, $nome) {
        $this->codigo_cidade = $codigo_cidade;
        $this->uf = $uf;
        $this->nome = $nome;
    }

    public function getCodigoCidade() {
        return $this->codigo_cidade;
    }
    public function getUf() {
        return $this->uf;
    }
    public function getNome() {
        return $this->nome;
    }
}

interface CidadeDao {
    public function findByCity($uf, $nome_cidade);
}
