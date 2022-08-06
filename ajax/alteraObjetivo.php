<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// Arquivo de conexão
include("../mysql/conexao.php");

$autenticado = false;

// Busca o email e a senha no banco de dados
$sql = "UPDATE 
            usuarios
        SET 
            objetivo = '" . $_POST["objetivo"] . "'
        WHERE 
            cpf = '" .  $_SESSION["cpf"] . "'";
mysqli_query($mysqli, $sql);
