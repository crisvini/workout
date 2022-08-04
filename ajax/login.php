<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// Arquivo de conexão
include("../mysql/conexao.php");

$autenticado = false;

// Busca o email e a senha no banco de dados
$sql = "SELECT
            email,
            nome,
            cpf
        FROM 
            usuarios
        WHERE
            email ='" . $_POST["email"] . "'
        AND
            senha = MD5('" . $_POST["senha"] . "')";
if (mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["email"] != null) {
    $autenticado = true;
    // Cria session com dados necessários
    $_SESSION["email"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["email"];
    $_SESSION["nome"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["nome"];
    $_SESSION["cpf"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["cpf"];
}

echo $autenticado;
