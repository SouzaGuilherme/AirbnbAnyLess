<?php


class Endereco {
    private $numero_seq_end;
    private $codigo_cidade;
    private $uf;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cep;

    public function __construct($codigo_cidade, $uf, $logradouro, $numero, $complemento, $bairro, $cep) {
        $this->numero_seq_end = -1;
        $this->codigo_cidade = $codigo_cidade;
        $this->uf = $uf;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cep = $cep;
    }

    public function getNumeroSeqEnd(){
        return $this->numero_seq_end;
    }
    public function getCodigoCidade(){
        return $this->codigo_cidade;
    }
    public function getUf(){
        return $this->uf;
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
    public function setNumeroSeqEnd($value){
        $this->numero_seq_end = $value;
    }
    public function setCodigoCidade($value){
        $this->codigo_cidade = $value;
    }
    public function setUf($value){
        $this->uf = $value;
    }
    public function setLogradouro($value){
        $this->logradouro = $value;
    }
    public function setNumero($value){
        $this->numero = $value;
    }
    public function setComplemento($value){
        $this->complemento = $value;
    }
    public function setBairro($value){
        $this->bairro = $value;
    }
    public function setCep($value){
        $this->cep = $value;
    }


}

interface EnderecoDao {
    public function add(Endereco $endereco);
    public function remove(Endereco $endereco);
}
