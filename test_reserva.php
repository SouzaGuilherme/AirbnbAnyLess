<?php

require 'config.php';
require 'models/Reserva.php';
require 'dao/ReservaDaoMysql.php';

$reserva = new Reserva(
    "3",
    "123456789",
    "2021/08/01",
    "2021/08/02",
);

$reservaDao = new ReservaDaoMysql($pdo);
# $reservaDao->add($reserva);
# $userDao->remove($user);
