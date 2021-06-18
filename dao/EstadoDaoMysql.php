<?php
require __DIR__ . '/../models/Estado.php';


class EstadoDaoMysql implements EstadoDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByUF($uf)
    {
        
    }

    public function findAllUf() {
        
        $sql = $this->pdo->prepare("SELECT * FROM estados");
        $sql->execute();

        $array = [];
        if ($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
        
    }

}