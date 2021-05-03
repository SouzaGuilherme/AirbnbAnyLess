<?php
require_once '../models/User.php';


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

    public function add(User $user) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (cpf, numero_seq_end, codigo_cidade, uf, nome, email, telefone, foto, tipo_usuario, senha, token) VALUES (:cpf, :numero_seq_end, :codigo_cidade, :uf, :nome, :email, :telefone, :foto, :tipo_usuario, :senha, :token);");

        $sql->bindValue(":cpf", $user->getCpf());
        $sql->bindValue(":numero_seq_end", $user->getNumeroSeqEnd());
        $sql->bindValue(":codigo_cidade", $user->getCodigoCidade());
        $sql->bindValue(":uf", $user->getUf());
        $sql->bindValue(":nome", $user->getNome());
        $sql->bindValue(":email", $user->getEmail());
        $sql->bindValue(":telefone", $user->getTelefone());
        $sql->bindValue(":foto", $user->getFoto());
        $sql->bindValue(":tipo_usuario", $user->getTipoUsuario());
        $sql->bindValue(":senha", $user->getSenha());
        $sql->bindValue(":token", $user->getToken());
        $sql->execute();
    }

    public function remove(User $user){
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $user->getCpf());
        $sql->execute();
    }

    public function edit(User $user){

        $sql = $this->pdo->prepare("UPDATE usuarios (cpf, numero_seq_end, codigo_cidade, :uf, nome, email, telefone, foto, tipo_usuario, senha, token) VALUES ( :cpf, :numero_seq_end, :codigo_cidade, :uf, :nome, :email, :telefone, :foto, :tipo_usuario, :senha, :token) WHERE cpf = :cpf;");

        $sql->bindValue(":cpf", $user->getCpf());
        $sql->bindValue(":numero_seq_end", $user->getCpf());
        $sql->bindValue(":codigo_cidade", $user->getCpf());
        $sql->bindValue(":uf", $user->getCpf());
        $sql->bindValue(":nome", $user->getCpf());
        $sql->bindValue(":email", $user->getCpf());
        $sql->bindValue(":telefone", $user->getCpf());
        $sql->bindValue(":foto", $user->getCpf());
        $sql->bindValue(":tipo_usuario", $user->getCpf());
        $sql->bindValue(":senha", $user->getCpf());
        $sql->bindValue(":token", $user->getCpf());
        $sql->execute();

    }
}