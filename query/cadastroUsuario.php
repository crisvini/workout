<?php
// Arquivo de conexão
include("../mysql/conexao.php");

session_start();
// Insere os dados da página anterior na session do php
$_SESSION["objetivo"] = $_POST["objetivo"];

$sql =
    "INSERT INTO 
        usuarios (nome, email, cpf, nascimento, senha, plano, numero_cartao, titular_cartao, vencimento, cvv, cpf_titular, objetivo) 
    VALUES 
        ('" . $_SESSION['nome'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['cpf'] . "', '" . $_SESSION['nascimento'] . "', MD5('" . $_SESSION['senha'] . "'),
         '" . $_SESSION['plano'] . "', '" . $_SESSION['numero_cartao'] . "', '" . $_SESSION['titular'] . "', '" . $_SESSION['vencimento'] . "', '" . $_SESSION['cvv'] . "',
          '" . $_SESSION['cpf_titular'] . "',  '" . $_SESSION['objetivo'] . "')";

if ($mysqli->query($sql) === true)
    header('Location: ../home.php');
else
    header('Location: ../index.php');

$mysqli->close();
