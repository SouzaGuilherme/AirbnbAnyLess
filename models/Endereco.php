<?php

class Endereco {
    private $logradouro;
    private $numero;
    private $numeroSeqEnd;
    private $codigoCidade;
    private $uf;
    private $complemento;
    private $bairro;
    private $cep;


    public function __construct($logradouro, $numeroSeqEnd, $uf, $codigoCidade, $numero, $complemento, $bairro, $cep) {
        $this->logradouro   = $logradouro;
        $this->numeroSeqEnd = $numeroSeqEnd;
        $this->uf = $uf;
        $this->codigoCidade = $codigoCidade;
        $this->numero       = $numero;
        $this->complemento  = $complemento;
        $this->bairro       = $bairro;
        $this->cep          = $cep;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }

    public function getNumeroSeqEnd(){
        return $this->numeroSeqEnd;
    }

    public function getUf(){
        return $this->uf;
    }

    public function getCodigoCidade(){
        return $this->codigoCidade;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function setNumeroSeqEnd($numeroSeqEnd){
        $this->numeroSeqEnd = $numeroSeqEnd;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function setCodigoCidade($codigoCidade){
        $this->codigoCidade = $codigoCidade;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

}

interface EnderecoDAO {
    public function findByCep($cep);
    public function findByLogradouro($logradouro);
    public function findByBairro($bairro);
    public function add(Endereco $endereco);
    public function remove(Endereco $endereco);
    public function update(Endereco $endereco);
}