<?php
require_once 'models/User.php';

class UserDaoMysql implements UserDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        
    }

    private function generateUser($dictData) {
        return new User(
            $dictData['cpf'],
            $dictData['numeroSeqEnd'],
            $dictData['codigoCidade'],
            $dictData['uf'],
            $dictData['nome'],
            $dictData['email'],
            $dictData['telefone'],
            $dictData['foto'],
            $dictData['tipoUsuario'],
            $dictData['senha'],
            $dictData['token'],
        );
    }

    public function findByToken($token) {
       if (!empty($token)){
           $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE token = :token");
           $sql->bindValue(":token", $token);
           $sql->execute();

           if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($dictData);
                return $user;
           }
       }
       return False;
    }
}