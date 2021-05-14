<?php
require_once 'models/Imovel.php';


class ImovelDaoMysql implements ImovelDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function generateImovel($dictData){
        return new Imovel(
           $dictData['codigo_imovel'],
           $dictData['codigo_usuario'],
           $dictData['numero_seq_end'],
           $dictData['codigo_cidade'],
           $dictData['uf'],
           $dictData['descricao'],
           $dictData['qtd_quartos'],
           $dictData['qtd_banheiros'],
           $dictData['qtd_salas'],
           $dictData['piscina'],
           $dictData['vagas_garagem'],
           $dictData['valor'],
           $dictData['alugado'],
        );
    }

    public function add(Imovel $imovel) {
        $sql = $this->pdo->prepare("INSERT INTO imoveis (
            codigo_imovel, codigo_usuario, numero_seq_end, codigo_cidade, uf, descricao, qtd_quartos, qtd_banheiros, qtd_salas, piscina, vagas_garagem, valor, alugado
        ) VALUES (
            :codigo_imovel,:codigo_usuario,:numero_seq_end,:codigo_cidade,:uf,:descricao, :qtd_quartos, :qtd_banheiros, :qtd_salas, :piscina, :vagas_garagem, :valor, :alugado
        );");
        $sql->bindValue(":codigo_imovel", $imovel->getCodigo_imovel());
        $sql->bindValue(":codigo_cidade", $imovel->getCodigo_cidade());
        $sql->bindValue(":codigo_usuario", $imovel->getCodigo_usuario());
        $sql->bindValue(":numero_seq_end", $imovel->getNumero_seq_end());
        $sql->bindValue(":uf", $imovel->getUf());
        $sql->bindValue(":descricao", $imovel->getDescricao());
        $sql->bindValue(":qtd_quartos", $imovel->getQtd_quartos());
        $sql->bindValue(":qtd_banheiros", $imovel->getQtd_banheiros());
        $sql->bindValue(":qtd_salas", $imovel->getQtd_salas());
        $sql->bindValue(":piscina", $imovel->getPiscina());
        $sql->bindValue(":vagas_garagem", $imovel->getVagas_garagem());
        $sql->bindValue(":valor", $imovel->getValor());
        $sql->bindValue(":alugado", $imovel->getAlugado());
        $sql->execute();
    }

    public function findByKeys($codigo_imovel, $codigo_cidade, $codigo_usuario, $numero_seq_end) {
      if (!empty($codigo_imovel AND $codigo_cidade AND $codigo_usuario AND $numero_seq_end)){
          $sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_imovel = :codigo_imovel AND codigo_cidade = :codigo_cidade AND codigo_usuario = :codigo_usuario AND numero_seq_end = :numero_seq_end");
          $sql->bindValue(":codigo_imovel", $codigo_imovel);
          $sql->bindValue(":codigo_cidade", $codigo_cidade);
          $sql->bindValue(":codigo_usuario", $codigo_usuario);
          $sql->bindValue(":numero_seq_end", $numero_seq_end);
          $sql->execute();

          if ($sql->rowCount() > 0){
               $dictData = $sql->fetch(PDO::FETCH_ASSOC);
               $imovel = $this->generateImovel($dictData);
               return $imovel;
          }
      }
      return false;
    }

    public function findByCodigo_imovel($codigo_imovel){
      if (!empty($codigo_imovel)){
          $sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_imovel = :codigo_imovel");
          $sql->bindValue(":codigo_imovel", $codigo_imovel);
          $sql->execute();

          if ($sql->rowCount() > 0){
               $dictData = $sql->fetch(PDO::FETCH_ASSOC);
               $imovel = $this->generateImovel($dictData);
               return $imovel;
          }
      }
      return false;
    }

    public function findByCodigo_cidade($codigo_cidade){
      if (!empty($codigo_cidade)){
          $sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_cidade = :codigo_cidade");
          $sql->bindValue(":codigo_cidade", $codigo_cidade);
          $sql->execute();

          if ($sql->rowCount() > 0){
               $dictData = $sql->fetch(PDO::FETCH_ASSOC);
               $imovel = $this->generateImovel($dictData);
               return $imovel;
          }
      }
      return false;
    }

    public function findByCodigo_usuario($codigo_usuario){
      if (!empty($codigo_usuario)){
          $sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_usuario = :codigo_usuario");
          $sql->bindValue(":codigo_usuario", $codigo_usuario);
          $sql->execute();

          if ($sql->rowCount() > 0){
               $dictData = $sql->fetch(PDO::FETCH_ASSOC);
               $imovel = $this->generateImovel($dictData);
               return $imovel;
          }
      }
      return false;
    }

    public function findByNumero_seqEnd($numero_seq_end){
      if (!empty($numero_seq_end)){
          $sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE numero_seq_end = :numero_seq_end");
          $sql->bindValue(":numero_seq_end", $numero_seq_end);
          $sql->execute();

          if ($sql->rowCount() > 0){
               $dictData = $sql->fetch(PDO::FETCH_ASSOC);
               $imovel = $this->generateImovel($dictData);
               return $imovel;
          }
      }
      return false;
    }

    public function update(Imovel $imovel){
      $sql = $this->pdo->prepare("UPDATE imoveis SET
        codigo_imovel = :codigo_imovel,
        codigo_usuario = :codigo_usuario,
        numero_seq_end = :numero_seq_end,
        codigo_cidade = :codigo_cidade,
        uf = :uf,
        descricao = :descricao,
        qtd_quartos = :qtd_quartos,
        qtd_banheiros = :qtd_banheiros,
        qtd_salas = :qtd_salas,
        piscina = :piscina,
        vagas_garagem = :vagas_garagem,
        valor = :valor,
        alugado = :alugado
        WHERE codigo_imovel = :codigo_imovel;"
    );

      $sql->bindValue(":codigo_imovel", $imovel->getCodigo_imovel());
      $sql->bindValue(":codigo_usuario", $imovel->getCodigo_usuario());
      $sql->bindValue(":numero_seq_end", $imovel->getNumero_seq_end());
      $sql->bindValue(":codigo_cidade", $imovel->getCodigo_cidade());
      $sql->bindValue(":uf", $imovel->getUf());
      $sql->bindValue(":descricao", $imovel->getDescricao());
      $sql->bindValue(":qtd_quartos", $imovel->getQtd_quartos());
      $sql->bindValue(":qtd_banheiros", $imovel->getQtd_banheiros());
      $sql->bindValue(":qtd_salas", $imovel->getQtd_salas());
      $sql->bindValue(":piscina", $imovel->getPiscina());
      $sql->bindValue(":vagas_garagem", $imovel->getVagas_garagem());
      $sql->bindValue(":valor", $imovel->getValor());
      $sql->bindValue(":alugado", $imovel->getAlugado());
      $sql->execute();

    return true;
  }

    public function remove(Imovel $imovel){
      $sql = $this->pdo->prepare("DELETE FROM imoveis WHERE codigo_imovel = :codigo_imovel");
      $sql->bindValue(":codigo_imovel", $imovel->getCodigo_imovel());
      $sql->execute();
    }
}
