<?php
require __DIR__ . '/../models/Cidade.php';


class CidadeDaoMysql implements CidadeDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByCity($uf, $nome_cidade) {
        if (!empty($uf and $nome_cidade)) {
            $sql = $this->pdo->prepare("SELECT * FROM cidades WHERE uf = :uf AND nome = :nome_cidade");
            $sql->bindValue(":uf", $uf);
            $sql->bindValue(":nome_cidade", $nome_cidade);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $cidade = new Cidade(
                    $dictData['codigo_cidade'],
                    $dictData['uf'],
                    $dictData['nome'],
                );
                return $cidade;
            }
        }
        return false;
    }

    public function findByCodeCity($codigo_cidade) {
        
        $sql = $this->pdo->prepare("SELECT * FROM cidades WHERE codigo_cidade = :codigo_cidade ORDER BY uf, nome ASC");
        $sql->bindValue(":codigo_cidade", $codigo_cidade);
        $sql->execute();

        $cidade = [];
        if ($sql->rowCount() > 0){
            $dictData = $sql->fetch();
            $cidade = new Cidade(
                $dictData['codigo_cidade'],
                $dictData['uf'],
                $dictData['nome'],
            );
            return $cidade;
        }
        return false;
        
    }

    public function findAllCity() {
        
        $sql = $this->pdo->prepare("SELECT * FROM cidades ORDER BY uf, nome ASC");
        $sql->execute();

        $array = [];
        if ($sql->rowCount() > 0){
            $dataAll = $sql->fetchAll();
            foreach ($dataAll as $data) {
                array_push($array, new Cidade(
                    $data['codigo_cidade'],
                    $data['uf'],
                    $data['nome'],
                ));
            }
        }
        return $array;
        
    }

}
