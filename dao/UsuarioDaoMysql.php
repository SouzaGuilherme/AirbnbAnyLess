<?php
require __DIR__ . '/../models/Usuario.php';


class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function generateUser($dictData) {
        return new Usuario(
            $cpf = $dictData['cpf'],
            $numero_seq_end = $dictData['numero_seq_end'],
            $codigo_cidade = $dictData['codigo_cidade'],
            $uf = $dictData['uf'],
            $nome = $dictData['nome'],
            $email = $dictData['email'],
            $telefone = $dictData['telefone'],
            $foto = $dictData['foto'],
            $tipo_usuario = $dictData['tipo_usuario'],
            $senha = $dictData['senha'],
        );
    }

    public function findByEmail($email) {

        if (!empty($email)) {

            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($dictData);
                return $user;
            }
        }
        return false;
    }

    public function findByCpf($cpf) {
        if (!empty($cpf)) {

            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($dictData);
                return $user;
            }
        }
        return false;
    }

    public function add(Usuario $user) {

        $sql = $this->pdo->prepare("SELECT cpf FROM usuarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $user->getCpf());
        $sql->execute();

        if ($sql->rowCount() == 0) {

            $sql = $this->pdo->prepare("INSERT INTO usuarios (
                cpf, numero_seq_end, codigo_cidade, uf, nome, email, telefone, foto, tipo_usuario, senha
            ) VALUES (
                :cpf, :numero_seq_end, :codigo_cidade, :uf, :nome, :email, :telefone, :foto, :tipo_usuario, :senha
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
            $sql->bindValue(":senha", md5($user->getSenha()));
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function remove(Usuario $user) {
        /* Remove um usuário do database
        */
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $user->getCpf());
        $sql->execute();
    }

    public function update(Usuario $user) {
        /* Atualiza um usuário do database.
        */

        $sql = $this->pdo->prepare(
            "UPDATE usuarios SET
            cpf = :cpf,
            numero_seq_end = :numero_seq_end,
            senha = :senha,
            nome = :nome,
            codigo_cidade = :codigo_cidade,
            uf = :uf,
            telefone = :telefone,
            email = :email,
            foto = :foto,
            tipo_usuario = :tipo_usuario
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
        $sql->execute();

        return true;
    }

    public function login($email, $password) {

        $sql = $this->pdo->prepare("SELECT cpf FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados_usuario = $sql->fetch();
            $_SESSION["cLogin"] = $dados_usuario["cpf"];
            return true;
        } else {
            return false;
        }
    }

    public function getTotalUsuarios() {
        $sql = $this->pdo->query("SELECT COUNT(*) as c FROM usuarios");
        $row = $sql->fetch();
        return $row["c"];
    }
}
