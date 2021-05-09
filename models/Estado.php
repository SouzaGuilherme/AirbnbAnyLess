<?php


class State {
    private $nome;


    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

}

//interface StateDAO {
  //  public function findByName($name);
   // public function add(State $name);
   // public function remove(State $name);
   // public function update(State $name);
//}
