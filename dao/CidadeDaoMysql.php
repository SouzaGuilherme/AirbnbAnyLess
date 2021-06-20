<?php
require __DIR__ . '/../models/Cidade.php';


class CidadeDaoMysql implements CidadeDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function generateCidade($dictData){
        return new Cidade(
           $dictData['codigo_cidade'],
           $dictData['uf'],
           $dictData['nome'],
        );
    }


    public function findByCity($uf, $nome) {
        if (!empty($uf AND $nome)){
            $sql = $this->pdo->prepare("SELECT * FROM cidades WHERE uf = :uf AND nome = :nome");
            $sql->bindValue(":uf", $uf);
            $sql->bindValue(":nome", $nome);
            $sql->execute();

            if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $cidade = $this->generateCidade($dictData);
                return $cidade;
            }
        }
        return false;
    }

    public function findByCodigoCidade($codigo_cidade) {
        if (!empty($codigo_cidade)){
            $sql = $this->pdo->prepare("SELECT * FROM cidades WHERE  codigo_cidade = :codigo_cidade");
            $sql->bindValue(":codigo_cidade", $codigo_cidade);
            $sql->execute();

            if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $cidade = $this->generateCidade($dictData);
                return $cidade;
            }
        }
        return false;
    }

    

}