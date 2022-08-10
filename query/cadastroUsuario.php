<?php
// Arquivo de conexão
include("../mysql/conexao.php");

session_start();
// Insere os dados da página anterior na session do php
$_SESSION["objetivo"] = $_POST["objetivo"];
$fotoPerfilPadrao = fotoPerfilPadrao();

// Define a primeira ficha
$_id_ultima_ficha = 0;
if ($_SESSION['objetivo'] == "emagrecimento")
    $_id_ultima_ficha = 1;
else if ($_SESSION['objetivo'] == "hipertrofia")
    $_id_ultima_ficha = 4;

// Define a última ficha completa
$ultima_ficha_completa = 0;
if ($_SESSION['objetivo'] == "emagrecimento")
    $ultima_ficha_completa = 3;
else if ($_SESSION['objetivo'] == "hipertrofia")
    $ultima_ficha_completa = 6;

$sql =
    "INSERT INTO 
        usuarios (nome, email, cpf, nascimento, senha, plano, numero_cartao, titular_cartao, vencimento, cvv, cpf_titular, objetivo, _id_ultima_ficha, ultima_ficha_completa, foto_perfil) 
    VALUES 
        ('" . $_SESSION['nome'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['cpf'] . "', '" . $_SESSION['nascimento'] . "', MD5('" . $_SESSION['senha'] . "'),
         '" . $_SESSION['plano'] . "', '" . $_SESSION['numero_cartao'] . "', '" . $_SESSION['titular'] . "', '" . $_SESSION['vencimento'] . "', '" . $_SESSION['cvv'] . "',
          '" . $_SESSION['cpf_titular'] . "',  '" . $_SESSION['objetivo'] . "', '" . $_id_ultima_ficha . "', '" . $ultima_ficha_completa . "', '" . $fotoPerfilPadrao . "')";

if ($mysqli->query($sql) === true)
    header('Location: ../home.php');
else
    header('Location: ../index.php');

$mysqli->close();
