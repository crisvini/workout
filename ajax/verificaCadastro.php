<?php
error_reporting(E_ERROR | E_PARSE);

// Arquivo de conexão
include("../mysql/conexao.php");

$cpfValido = false;
$emailValido = false;

// Verifica se o cpf já está cadastrado
$sql = "SELECT
            cpf
        FROM 
            usuarios
        WHERE
            cpf ='" . $_POST["cpf"] . "'";
$resultado = mysqli_query($mysqli, $sql);
if (mysqli_fetch_assoc($resultado)["cpf"] == null) {
    $cpfValido = true;
}

// Verifica se o email já está cadastrado
$sql = "SELECT
            email
        FROM 
            usuarios
        WHERE
            email ='" . $_POST["email"] . "'";
$resultado = mysqli_query($mysqli, $sql);
if (mysqli_fetch_assoc($resultado)["email"] == null) {
    $emailValido = true;
}

// Se o email ou o cpf já estiver cadastrado, retorna false
if ($cpfValido != true || $emailValido != true)
    echo 'invalido';
else
    echo 'valido';
