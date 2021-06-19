<?php
require_once __DIR__ .  "/../models/Imovel.php";


class ImovelDaoMysql implements ImovelDAO {
	private $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	private function generateImovel($dictData) {

		$imovel = new Imovel(
			$cpf = $dictData["cpf"],
			$numero_seq_end = $dictData["numero_seq_end"],
			$codigo_cidade = $dictData["codigo_cidade"],
			$uf = $dictData["uf"],
			$descricao = $dictData["descricao"],
			$qtd_quartos = $dictData["qtd_quartos"],
			$qtd_banheiros = $dictData["qtd_banheiros"],
			$qtd_salas = $dictData["qtd_salas"],
			$qtd_piscina = $dictData["piscina"],
			$vagas_garagem = $dictData["vagas_garagem"],
			$valor = $dictData["valor"],
			$habilitado = $dictData["habilitado"],
			$titulo = $dictData["titulo"]
		);

		$imovel->setCodigoImovel($dictData["codigo_imovel"]);

		return $imovel;
	}

	public function add(Imovel $imovel) {

		$sql = $this->pdo->prepare("INSERT INTO imoveis (
            cpf, numero_seq_end, codigo_cidade, uf, descricao, qtd_quartos, qtd_banheiros, qtd_salas, piscina, vagas_garagem, valor, habilitado
        ) VALUES (
            :cpf,:numero_seq_end,:codigo_cidade,:uf,:descricao, :qtd_quartos, :qtd_banheiros, :qtd_salas, :piscina, :vagas_garagem, :valor, :habilitado
        );");
		$sql->bindValue(":numero_seq_end", $imovel->getNumeroSeqEnd());
		$sql->bindValue(":codigo_cidade", $imovel->getCodigoCidade());
		$sql->bindValue(":cpf", $imovel->getCpf());
		$sql->bindValue(":uf", $imovel->getUf());
		$sql->bindValue(":descricao", $imovel->getDescricao());
		$sql->bindValue(":qtd_quartos", $imovel->getQtdQuartos());
		$sql->bindValue(":qtd_banheiros", $imovel->getQtdBanheiros());
		$sql->bindValue(":qtd_salas", $imovel->getQtdSalas());
		$sql->bindValue(":piscina", $imovel->getPiscina());
		$sql->bindValue(":vagas_garagem", $imovel->getVagasGaragem());
		$sql->bindValue(":valor", $imovel->getValor());
		$sql->bindValue(":habilitado", $imovel->getHabilitado());
		$sql->execute();
		return true;
	}

	public function update(Imovel $imovel) {
		$sql = $this->pdo->prepare(
			"UPDATE imoveis SET
        codigo_imovel = :codigo_imovel,
        cpf = :cpf,
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
        habilitado = :habilitado
        WHERE codigo_imovel = :codigo_imovel;"
		);

		$sql->bindValue(":codigo_imovel", $imovel->getCodigoImovel());
		$sql->bindValue(":cpf", $imovel->getCpf());
		$sql->bindValue(":numero_seq_end", $imovel->getNumeroSeqEnd());
		$sql->bindValue(":codigo_cidade", $imovel->getCodigoCidade());
		$sql->bindValue(":uf", $imovel->getUf());
		$sql->bindValue(":descricao", $imovel->getDescricao());
		$sql->bindValue(":qtd_quartos", $imovel->getQtdQuartos());
		$sql->bindValue(":qtd_banheiros", $imovel->getQtdBanheiros());
		$sql->bindValue(":qtd_salas", $imovel->getQtdSalas());
		$sql->bindValue(":piscina", $imovel->getPiscina());
		$sql->bindValue(":vagas_garagem", $imovel->getVagasGaragem());
		$sql->bindValue(":valor", $imovel->getValor());
		$sql->bindValue(":habilitado", $imovel->getHabilitado());
		$sql->execute();

		return true;
	}

	public function remove(Imovel $imovel) {
		$sql = $this->pdo->prepare("DELETE FROM imoveis WHERE codigo_imovel = :codigo_imovel");
		$sql->bindValue(":codigo_imovel", $imovel->getCodigoImovel());
		$sql->execute();
	}
	
	public function removeByCode($codigo_imovel) {

		$sql = $this->pdo->prepare("DELETE FROM imoveis WHERE codigo_imovel = :codigo_imovel");
		$sql->bindValue(":codigo_imovel", $codigo_imovel);
		$sql->execute();
	}

	public function findAllImoveis() {
		$sql = $this->pdo->prepare("SELECT * FROM imoveis");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}
	}

	public function findAllImoveisWithCity() {
		$sql = $this->pdo->prepare("
			SELECT `imoveis`.codigo_cidade, codigo_imovel, cpf, numero_seq_end, `imoveis`.uf, descricao, qtd_quartos, qtd_banheiros, qtd_salas, piscina, vagas_garagem, valor, habilitado, `cidades`.nome FROM `imoveis` 
			LEFT JOIN `cidades`
			ON `imoveis`.`codigo_cidade` = `cidades`.`codigo_cidade`
		");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}
	}

	public function findAllImoveisByCpf($cpf) {

		$sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE cpf = :cpf");
		$sql->bindValue(":cpf", $cpf);
		$sql->execute();

		$array = [];
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	
	public function findByKeys($codigo_imovel, $codigo_cidade, $cpf, $numero_seq_end) {

		if (!empty($codigo_imovel and $codigo_cidade and $cpf and $numero_seq_end)) {
			$sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_imovel = :codigo_imovel AND codigo_cidade = :codigo_cidade AND cpf = :cpf AND numero_seq_end = :numero_seq_end");
			$sql->bindValue(":codigo_imovel", $codigo_imovel);
			$sql->bindValue(":codigo_cidade", $codigo_cidade);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":numero_seq_end", $numero_seq_end);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dictData = $sql->fetch(PDO::FETCH_ASSOC);
				$imovel = $this->generateImovel($dictData);
				return $imovel;
			}
		}
		return false;
	}

	public function findByCodigoImovel($codigo_imovel) {
		if (!empty($codigo_imovel)) {
			$sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_imovel = :codigo_imovel");
			$sql->bindValue(":codigo_imovel", $codigo_imovel);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dictData = $sql->fetch(PDO::FETCH_ASSOC);
				$imovel = $this->generateImovel($dictData);
				return $imovel;
			}
		}
		return false;
	}

	public function findByCodigoCidade($codigo_cidade) {
		if (!empty($codigo_cidade)) {
			$sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE codigo_cidade = :codigo_cidade");
			$sql->bindValue(":codigo_cidade", $codigo_cidade);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dictData = $sql->fetch(PDO::FETCH_ASSOC);
				$imovel = $this->generateImovel($dictData);
				return $imovel;
			}
		}
		return false;
	}

	public function findByCodigoUsuario($cpf) {
		if (!empty($cpf)) {
			$sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE cpf = :cpf");
			$sql->bindValue(":cpf", $cpf);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dictData = $sql->fetch(PDO::FETCH_ASSOC);
				$imovel = $this->generateImovel($dictData);
				return $imovel;
			}
		}
		return false;
	}

	public function findByNumeroSeqEnd($numero_seq_end) {
		if (!empty($numero_seq_end)) {
			$sql = $this->pdo->prepare("SELECT * FROM imoveis WHERE numero_seq_end = :numero_seq_end");
			$sql->bindValue(":numero_seq_end", $numero_seq_end);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dictData = $sql->fetch(PDO::FETCH_ASSOC);
				$imovel = $this->generateImovel($dictData);
				return $imovel;
			}
		}
		return false;
	}



	public function getTotalImoveis() {
		$sql = $this->pdo->query("SELECT COUNT(*) as c FROM imoveis");
		$row = $sql->fetch();
		return $row["c"];
	}
}
