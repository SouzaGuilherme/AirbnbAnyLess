<?php

class Imovel {

    private $codigo_imovel;
    private $cpf;
    private $numero_seq_end;
    private $codigo_cidade;
    private $uf;
    private $descricao;
    private $qtd_quartos;
    private $qtd_banheiros;
    private $qtd_salas;
    private $piscina;
    private $vagas_garagem;
    private $valor;
    private $habilitado;
    private $titulo;
    private $foto;

    public function __construct($cpf, $numero_seq_end, $codigo_cidade, $uf, $descricao, $qtd_quartos, $qtd_banheiros, $qtd_salas, $piscina, $vagas_garagem, $valor, $habilitado, $titulo, $fotos){
      $this->codigo_imovel = -1;
      $this->cpf = $cpf;
      $this->numero_seq_end = $numero_seq_end;
      $this->codigo_cidade = $codigo_cidade;
      $this->uf = $uf;
      $this->descricao = $descricao;
      $this->qtd_quartos = $qtd_quartos;
      $this->qtd_banheiros = $qtd_banheiros;
      $this->qtd_salas = $qtd_salas;
      $this->piscina = $piscina;
      $this->vagas_garagem = $vagas_garagem;
      $this->valor = $valor;
      $this->habilitado = $habilitado;
      $this->titulo = $titulo;
      $this->fotos = $fotos;
    }

    public function getCodigoImovel(){
        return $this->codigo_imovel;
    }
    public function getCpf(){
        return $this->cpf;
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
    public function getDescricao(){
        return $this->descricao;
    }
    public function getQtdQuartos(){
        return $this->qtd_quartos;
    }
    public function getQtdBanheiros(){
        return $this->qtd_banheiros;
    }
    public function getQtdSalas(){
        return $this->qtd_salas;
    }
    public function getPiscina(){
        return $this->piscina;
    }
  	public function getVagasGaragem(){
        return $this->vagas_garagem;
    }
  	public function getValor(){
      return $this->valor;
    }
  	public function getHabilitado(){
      return $this->habilitado;
    }
    public function getTitulo(){
      return $this->titulo;
    }
    public function getFotos(){
      return $this->fotos;
    }
    public function setCodigoImovel($codigo_imovel){
        $this->codigo_imovel = $codigo_imovel;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function setNumeroSeqEnd($numero_seq_end){
        $this->numero_seq_end = $numero_seq_end;
    }
    public function setCodigoCidade($codigo_cidade){
        $this->codigo_cidade = $codigo_cidade;
    }
    public function setUf($uf){
        $this->uf = $uf;
    }
    public function setDescricao($descricao){
      $this->descricao = $descricao;
    }
    public function setQtdQuartos($qtd_quartos){
      $this->qtd_quartos = $qtd_quartos;
    }
    public function setQtdBanheiros($qtd_banheiros){
      $this->qtd_banheiros = $qtd_banheiros;
    }
    public function setQtdSalas($qtd_salas){
      $this->qtd_salas = $qtd_salas;
    }
    public function setPiscina($piscina){
      $this->piscina = $piscina;
    }
    public function setVagasGaragem($vagas_garagem){
      $this->vagas_garagem = $vagas_garagem;
    }
    public function setValor($valor){
      $this->valor = $valor;
    }
    public function setHabilidade($habilitado){
      $this->habilitado = $habilitado;
    }
    public function setTitulos($titulo){
      $this->titulo = $titulo;
    }
    public function setFotos($fotos){
      $this->fotos = $fotos;
    }

  }

interface ImovelDAO {

    public function add(Imovel $imovel);
    public function remove(Imovel $imovel);
    public function update(Imovel $imovel);
}
