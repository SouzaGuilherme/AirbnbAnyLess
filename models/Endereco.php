<?php


class Endereco {
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cep;


    public function __construct($logradouro, $numero, $complemento, $bairro, $cep) {
        $this->logradouro   = $logradouro;
        $this->numero       = $numero;
        $this->complemento  = $complemento;
        $this->bairro       = $bairro;
        $this->cep          = $cep;
    }

    public function getLogradouro(){
        return $this->logradouro;
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
    public function findByBairro($bairro)
    //public function add(Usuario $user);
    //public function remove(Usuario $user);
    //public function update(Usuario $user);
}