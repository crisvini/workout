<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

include("../mysql/conexao.php");

// $idProximaFicha = '';
// if ($_POST["idFicha"] == 1) {
//     $idProximaFicha = 2;
// } else if ($_POST["idFicha"] == 2) {
//     $idProximaFicha = 3;
// } else if ($_POST["idFicha"] == 3) {
//     $idProximaFicha = 1;
// } else if ($_POST["idFicha"] == 4) {
//     $idProximaFicha = 5;
// } else if ($_POST["idFicha"] == 5) {
//     $idProximaFicha = 6;
// } else if ($_POST["idFicha"] == 6) {
//     $idProximaFicha = 4;
// }

// Altera o objetivo
$sql = "UPDATE 
            usuarios
        SET 
            ultima_ficha_completa  = " . $_POST["idFicha"] . "
        WHERE 
            cpf = '" .  $_SESSION["cpf"] . "'";
mysqli_query($mysqli, $sql);

// $_SESSION["idFichaDoDia"] = $idProximaFicha;
