<?php

class Reserva {

    private $codigo_reserva;
    private $codigo_imovel;
    private $cpf;
    private $data_inicial;
    private $data_final;

    public function __construct($codigo_imovel, $cpf, $data_inicial, $data_final){ 
        $this->codigo_imovel = $codigo_imovel;
        $this->cpf = $cpf;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
    } 
    public function getCodigoReserva(){
        return $this->codigo_reserva;
    }
    public function getCodigoImovel(){
        return $this->codigo_imovel;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getDataInicial(){
        return $this->data_inicial;
    }
    public function getDataFinal(){
        return $this->data_final;
    }
    public function setCodigoReserva($codigo_reserva){
        $this->codigo_reserva = $codigo_reserva;
    }
    public function setCodigoImovel($codigo_imovel){
        $this->codigo_imovel = $codigo_imovel;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function setDataInicial($data_inicial){
        $this->data_inicial = $data_inicial;
    }
    public function setDataFinal($data_final){
        $this->data_final = $data_final;
    }
}

interface ReservaDAO {
    public function findByCodigoReserva($codigo_reserva);
    public function add(Reserva $reserva);
    public function remove(Reserva $reserva);
    public function update(Reserva $reserva);
}