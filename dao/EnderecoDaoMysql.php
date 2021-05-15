<?php
require_once 'models/Endereco.php';


class EnderecoDaoMysql implements EnderecoDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function generateEndereco($dictData) {
        return new Endereco(
            $dictData['codigoCidade'],
            $dictData['uf'],
            $dictData['logradouro'],
            $dictData['numero'],
            $dictData['complemento'],
            $dictData['bairro'],
            $dictData['cep'],      
        );
    }

    public function findByCep($cep) {
       if (!empty($cep)){
           $sql = $this->pdo->prepare("SELECT * FROM enderecos WHERE cep = :cep");
           $sql->bindValue(":cep", $cep);
           $sql->execute();

           if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $endereco = $this->generateEndereco($dictData);
                return $endereco;
           }
       }
       return false;
    }

    public function findByLogradouro($logradouro) { 
        if (!empty($logradouro)){
            $sql = $this->pdo->prepare("SELECT * FROM enderecos WHERE logradouro = :logradouro");
            $sql->bindValue(":logradouro", $logradouro);
            $sql->execute();

            if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $endereco = $this->generateEndereco($dictData);
                return $endereco;
            }
        }
        return false;
    }

    public function findByBairro($bairro) { 
        if (!empty($bairro)){
            $sql = $this->pdo->prepare("SELECT * FROM enderecos WHERE bairro = :bairro");
            $sql->bindValue(":bairro", $bairro);
            $sql->execute();

            if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $endereco = $this->generateEndereco($dictData);
                return $endereco;
            }
        }
        return false;
    }

    public function add(Endereco $endereco) {

        $newCodigoSeqEnd = $this->lastSeqEnd() + 1;
        $endereco->setNumeroSeqEnd($newCodigoSeqEnd);

        $sql = $this->pdo->prepare("INSERT INTO enderecos (
            numero_seq_end, codigo_cidade, uf, logradouro, numero, complemento, bairro, cep
        ) VALUES (
            :numero_seq_end, :codigo_cidade, :uf, :logradouro, :numero, :complemento, :bairro, :cep
        );");

        $sql->bindValue(":numero_seq_end", $endereco->getNumeroSeqEnd());
        $sql->bindValue(":codigo_cidade", $endereco->getCodigoCidade());
        $sql->bindValue(":uf", $endereco->getUf());
        $sql->bindValue(":logradouro", $endereco->getLogradouro());
        $sql->bindValue(":numero", $endereco->getNumero());
        $sql->bindValue(":complemento", $endereco->getComplemento());
        $sql->bindValue(":bairro", $endereco->getBairro());
        $sql->bindValue(":cep", $endereco->getCep());
        $sql->execute();
    }

    public function remove(Endereco $endereco){
        $sql = $this->pdo->prepare("DELETE FROM enderecos WHERE numero = :numero");
        $sql->bindValue(":numero", $endereco->getNumero());
        $sql->execute();
    }

    public function update(Endereco $endereco){

        $sql = $this->pdo->prepare("UPDATE enderecos SET
            numero_seq_end = :numero_seq_end,
            codigo_cidade = :codigo_cidade,
            uf = :uf,
            logradouro = :logradouro,
            numero = :numero,
            complemento = :complemento,
            bairro = :bairro,
            cep = :cep
            WHERE numero = :numero;"
        );

        $sql->bindValue(":numero_seq_end", $endereco->getNumeroSeqEnd());
        $sql->bindValue(":codigo_cidade", $endereco->getCodigoCidade());
        $sql->bindValue(":uf", $endereco->getUf());
        $sql->bindValue(":logradouro", $endereco->getLogradouro());
        $sql->bindValue(":numero", $endereco->getNumero());
        $sql->bindValue(":complemento", $endereco->getComplemento());
        $sql->bindValue(":bairro", $endereco->getBairro());
        $sql->bindValue(":cep", $endereco->getCep());
        $sql->execute();

        return true;
    }

    private function lastSeqEnd(){
        $sql = $this->pdo->prepare("SELECT MAX(numero_seq_end) FROM enderecos");
        $sql->execute();
        if ($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data["MAX(numero_seq_end)"];
       }
    }
    
}   