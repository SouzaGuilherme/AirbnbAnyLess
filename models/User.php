<?php


class User {
    private $cpf;
    private $numeroSeqEnd;
    private $codigoCidade;
    private $uf;
    private $nome;
    private $email;
    private $telefone;
    private $foto;
    private $tipoUsuario;
    private $senha;
    private $token;


    public function __construct($cpf, $numeroSeqEnd, $codigoCidade, $uf, $nome, $email, $telefone, $foto, $tipoUsuario, $senha, $token) {
        $this->cpf = $cpf;
        $this->numeroSeqEnd = $numeroSeqEnd;
        $this->codigoCidade = $codigoCidade;
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
        return $this->numeroSeqEnd;
    }

    public function getCodigoCidade(){
        return $this->codigoCidade;
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

}

interface UserDAO {
    public function findByToken($token);
}