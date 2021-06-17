<?php
require __DIR__ . '/../models/Endereco.php';


class EnderecoDaoMysql implements EnderecoDao {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function add(Endereco $endereco) {
        $sql = $this->pdo->prepare("INSERT INTO enderecos (
            codigo_cidade, uf, logradouro, numero, complemento, bairro, cep
        ) VALUES (
            :codigo_cidade, :uf, :logradouro, :numero, :complemento, :bairro, :cep
        );");
        # print_r($endereco);
        # $sql->bindValue(":numero_seq_end",  $endereco->getNumeroSeqEnd());
        $sql->bindValue(":codigo_cidade",   $endereco->getCodigoCidade());
        $sql->bindValue(":uf",              $endereco->getUf());
        $sql->bindValue(":logradouro",      $endereco->getLogradouro());
        $sql->bindValue(":numero",          $endereco->getNumero());
        $sql->bindValue(":complemento",     $endereco->getComplemento());
        $sql->bindValue(":bairro",          $endereco->getBairro());
        $sql->bindValue(":cep",             $endereco->getCep());
        $sql->execute();

        return true;
    }

    public function remove(Endereco $endereco) {
        $sql = $this->pdo->prepare("DELETE FROM enderecos WHERE numero_seq_end = :numero_seq_end AND codigo_cidade = :codigo_cidade AND uf = :uf");
        $sql->bindValue(":numero_seq_end", $endereco->getNumeroSeqEnd());
        $sql->bindValue(":codigo_cidade", $endereco->getCodigoCidade());
        $sql->bindValue(":uf", $endereco->getUf());
        $sql->execute();
    }


    public function findEndereco($codigo_cidade, $uf, $numero, $cep) {
        $sql = $this->pdo->prepare("SELECT * FROM enderecos WHERE codigo_cidade = :codigo_cidade AND uf = :uf AND numero = :numero AND cep = :cep");
        $sql->bindValue(":codigo_cidade", $codigo_cidade);
        $sql->bindValue(":uf", $uf);
        $sql->bindValue(":numero", $numero);
        $sql->bindValue(":cep", $cep);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dictData = $sql->fetch(PDO::FETCH_ASSOC);
            print_r($dictData);
            $endereco = new Endereco(
                $dictData['codigo_cidade'],
                $dictData['uf'],
                $dictData['logradouro'],
                $dictData['numero'],
                $dictData['complemento'],
                $dictData['bairro'],
                $dictData['cep'],
            );
            $endereco->setNumeroSeqEnd($dictData["numero_seq_end"]);
            return $endereco;
        }
        return false;
    }
}
