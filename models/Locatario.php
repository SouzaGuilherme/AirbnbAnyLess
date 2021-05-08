<?php



class Locatario extends Usuario {

    public function alugar(){
        $_SESSION["flash"] = "alugar";
    }

}