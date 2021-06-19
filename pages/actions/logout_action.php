<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Auth.php';


if(isset($_SESSION["token"])){
    session_destroy();
    header("Location:../login.php");
}
