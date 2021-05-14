<?php

class Imovel {

    private $codigo_imovel;
    private $codigo_usuario;
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
    private $alugado;

    public function __construct($codigo_imovel, $codigo_usuario, $numero_seq_end, $codigo_cidade, $uf, $descricao, $qtd_quartos, $qtd_banheiros, $qtd_salas, $piscina, $vagas_garagem, $valor, $alugado){
      $this->codigo_imovel = $codigo_imovel;
      $this->codigo_usuario = $codigo_usuario;
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
      $this->alugado = $alugado;
    }

    public function getCodigoImovel(){
        return $this->codigo_imovel;
    }
    public function getCodigoUsuario(){
        return $this->codigo_usuario;
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
  	public function getAlugado(){
      return $this->alugado;
    }
    public function setCodigoImovel($codigo_imovel){
        $this->codigo_imovel = $codigo_imovel;
    }
    public function setCodigoUsuario($codigo_usuario){
        $this->codigo_usuario = $codigo_usuario;
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
    public function setAlugado($alugado){
      $this->alugado = $alugado;
    }
  }

interface ImovelDAO {
    public function findByKeys($codigo_imovel, $codigo_cidade, $codigo_usuario, $numero_seq_end);
    public function findByCodigoCidade($codigo_cidade);
    public function findByCodigoUsuario($codigo_usuario);
    public function findByCodigoImovel($codigo_imovel);
    public function findByNumeroSeqEnd($numero_seq_end);
    public function add(Imovel $imovel);
    public function remove(Imovel $imovel);
    public function update(Imovel $imovel);
}