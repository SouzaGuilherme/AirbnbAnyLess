<?php
require_once 'models/Cidade.php';


class CidadeDaoMysql implements CidadeDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByCity($uf, $nome_cidade) {
        if (!empty($uf AND $nome_cidade)){
            $sql = $this->pdo->prepare("SELECT * FROM cidades WHERE uf = :uf AND nome = :nome_cidade");
            $sql->bindValue(":uf", $uf);
            $sql->bindValue(":nome_cidade", $nome_cidade);
            $sql->execute();

            if ($sql->rowCount() > 0){
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
}