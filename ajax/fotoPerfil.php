<?php
session_start();

include("../mysql/conexao.php");

// Altera a foto de perfil
$sql = "UPDATE 
            usuarios
        SET 
            foto_perfil = '" . $_POST["base64"] . "'
        WHERE 
            cpf = '" .  $_SESSION["cpf"] . "'";
mysqli_query($mysqli, $sql);

$mysqli->close();

die($sql);
