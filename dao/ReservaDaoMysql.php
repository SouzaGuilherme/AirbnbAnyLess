<?php
require_once 'models/Reserva.php';


class ReservaDaoMysql implements ReservaDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function add(Reserva $reserva) {

        $newCodigoReserva = $this->lastCodigoReserva() + 1;
        $reserva->setCodigoReserva($newCodigoReserva);

        $sql = $this->pdo->prepare("INSERT INTO reservas (
            codigo_reserva, codigo_imovel, cpf, data_inicial, data_final
        ) VALUES (
            :codigo_reserva, :codigo_imovel, :cpf, :data_inicial, :data_final
        );");
        $sql->bindValue(":codigo_reserva", $reserva->getCodigoReserva());
        $sql->bindValue(":codigo_imovel", $reserva->getCodigoImovel());
        $sql->bindValue(":cpf", $reserva->getCpf());
        $sql->bindValue(":data_inicial", $reserva->getDataInicial());
        $sql->bindValue(":data_final", $reserva->getDataFinal());
        $sql->execute();
    }

    public function remove(Reserva $reserva) {
        $sql = $this->pdo->prepare("DELETE FROM reservas WHERE codigo_imovel = :codigo_imovel");
        $sql->bindValue(":codigo_imovel", $reserva->getCodigoImovel());
        $sql->execute();
    }

    public function update(Reserva $reserva) {

        $sql = $this->pdo->prepare(
            "UPDATE reservas SET
            codigo_reserva = :codigo_reserva,
            codigo_imovel = :codigo_imovel,
            cpf = :cpf,
            data_inicial = :data_inicial,
            data_final = :data_final,
            WHERE codigo_reserva = :codigo_reserva;"
        );
        # $sql->bindValue(":codigo_reserva", $reserva->getCodigoReserva());
        $sql->bindValue(":codigo_imovel", $reserva->getCodigoImovel());
        $sql->bindValue(":cpf", $reserva->getCpf());
        $sql->bindValue(":data_inicial", $reserva->getDataInicial());
        $sql->bindValue(":data_final", $reserva->getDataFinal());
        $sql->execute();

        return true;
    }

    public function findByCodigoReserva($codigo_reserva) {
        if (!empty($codigo_reserva)) {
            $sql = $this->pdo->prepare("SELECT * FROM reservas WHERE codigo_reserva = :codigo_reserva");
            $sql->bindValue(":codigo_reserva", $codigo_reserva);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dictData = $sql->fetch(PDO::FETCH_ASSOC);
                $reserva = new Reserva(
                    $dictData['codigo_imovel'],
                    $dictData['cpf'],
                    $dictData['data_inicial'],
                    $dictData['data_final'],
                );
                $reserva->setCodigoReserva($dictData['codigo_reserva']);
                return $reserva;
            }
        }
        return false;
    }

    private function lastCodigoReserva() {
        $sql = $this->pdo->prepare("SELECT MAX(codigo_reserva) FROM reservas");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data["MAX(codigo_reserva)"];
        }
    }

    public function reservasCodigoImovel($codigo_imovel) {
        $array = [];
        if (!empty($codigo_imovel)) {
            $sql = $this->pdo->prepare("SELECT * FROM reservas WHERE codigo_imovel = :codigo_imovel");
            $sql->bindValue(":codigo_imovel", $codigo_imovel);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
            return $array;
        }
        return $array;
    }

    public function estaAlugado($date_start, $date_end, $codigo_imovel){

        if (!empty($date_start) || !empty($date_end) || !empty($codigo_imovel)) {
            
            $reservasImovel = $this->reservasCodigoImovel($codigo_imovel);

            foreach ($reservasImovel as $reserva) {
               
                if (date($date_start) >= date($reserva["data_inicial"]) && date($date_end) <= date($reserva["data_final"])) {
                    echo "   True</br>";
                    return True;
                }
            }
        return false;
        }
    }


}
