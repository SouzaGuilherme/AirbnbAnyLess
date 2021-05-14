<?php
require_once 'models/Usuario.php';


class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function generateUser($dictData) {

        if ($dictData['tipo_usuario'] == "LOCATARIO") {
            return new Locatario(
                $dictData['cpf'],
                $dictData['numero_seq_end'],
                $dictData['codigo_cidade'],
                $dictData['uf'],
                $dictData['nome'],
                $dictData['email'],
                $dictData['telefone'],
                $dictData['foto'],
                $dictData['tipo_usuario'],
                $dictData['senha'],
                $dictData['token'],
            );}
        elseif ($dictData['tipo_usuario'] == "PROPRIETARIO") {
            return new Proprietario(
                $dictData['cpf'],
                $dictData['numero_seq_end'],
                $dictData['codigo_cidade'],
                $dictData['uf'],
                $dictData['nome'],
                $dictData['email'],
                $dictData['telefone'],
                $dictData['foto'],
                $dictData['tipo_usuario'],
                $dictData['senha'],
                $dictData['token'],
            );
        } 
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
       return false;
    }

    public function findByEmail($email) { 

        if (!empty($email)){

            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if ($sql->rowCount() > 0){
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($dictData);
                $SESSION["flash"] .= "Encontrou Email-";
                return $user;
            }
        }
        return false;
    }

    public function add(Usuario $user) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (
            cpf, numero_seq_end, codigo_cidade, uf, nome, email, telefone, foto, tipo_usuario, senha, token
        ) VALUES (
            :cpf, :numero_seq_end, :codigo_cidade, :uf, :nome, :email, :telefone, :foto, :tipo_usuario, :senha, :token
        );");

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

    public function remove(Usuario $user){
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $user->getCpf());
        $sql->execute();
    }

    public function update(Usuario $user){

        $sql = $this->pdo->prepare("UPDATE usuarios SET
            cpf = :cpf,
            numero_seq_end = :numero_seq_end,
            senha = :senha,
            nome = :nome,
            codigo_cidade = :codigo_cidade,
            uf = :uf,
            telefone = :telefone,
            email = :email,
            foto = :foto,
            tipo_usuario = :tipo_usuario,
            token = :token
            WHERE cpf = :cpf;"
        );

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

        return true;
    }
}   
