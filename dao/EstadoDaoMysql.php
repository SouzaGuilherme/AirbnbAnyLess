<?php
require __DIR__ . '/../models/Estado.php';


class EstadoDaoMysql implements EstadoDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByUF($uf) {
        if (!empty($uf)){
            $sql = $this->pdo->prepare("SELECT * FROM estado WHERE uf = :uf");
            $sql->bindValue(":uf", $uf);
            $sql->execute();

            if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $estado = return new Estado(
                    $dictData['uf'],
                );
                return $estado;
            }
        }
        return false;
    }
}