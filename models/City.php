<?php


class City {
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

//interface CityDAO {
   // public function findByName($name);
   // public function add(City $name);
   // public function remove(City $name);
   // public function update(City $name);
//}