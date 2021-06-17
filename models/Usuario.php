<?php


class Usuario {
    private $cpf;
    private $numero_seq_end;
    private $codigo_cidade;
    private $uf;
    private $nome;
    private $email;
    private $telefone;
    private $foto;
    private $tipoUsuario;
    private $senha;
    private $token;


    public function __construct($cpf, $numero_seq_end, $codigo_cidade, $uf, $nome, $email, $telefone, $foto, $tipoUsuario, $senha, $token) {
        $this->cpf = $cpf;
        $this->numero_seq_end = $numero_seq_end;
        $this->codigo_cidade = $codigo_cidade;
        $this->uf = $uf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->foto = $foto;
        $this->tipoUsuario = $tipoUsuario;
        $this->senha = $senha;
        $this->token = $token;
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

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getToken(){
        return $this->token;
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

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setToken($token){
        $this->token = $token;
    }

}

interface UsuarioDAO {
    public function findByToken($token);
    public function findByCPF($cpf);
    public function findByEmail($email);
    public function add(Usuario $user);
    public function remove(Usuario $user);
    public function update(Usuario $user);
}