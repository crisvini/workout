<?php
// Arquivo de conexão
include("../mysql/conexao.php");
include("../fotoPerfilPadrao.php");

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
         '" . $_SESSION['plano'] . "', MD5('" . $_SESSION['numero_cartao'] . "'), MD5('" . $_SESSION['titular'] . "'), MD5('" . $_SESSION['vencimento'] . "'), MD5('" . $_SESSION['cvv'] . "'),
          '" . $_SESSION['cpf_titular'] . "',  '" . $_SESSION['objetivo'] . "', '" . $_id_ultima_ficha . "', '" . $ultima_ficha_completa . "', '" . $fotoPerfilPadrao . "')";

if ($mysqli->query($sql) === true) {

    $sql =
        "SELECT
            id_usuarios
        FROM 
            usuarios
        WHERE
            cpf = '" . $_SESSION['cpf'] . "'";
    $id_usuarios = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["id_usuarios"];

    $sql =
        "SELECT
            *
        FROM 
            metas";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql2 =
                "INSERT INTO 
                    metas_usuarios (_id_usuarios, _id_metas, completo)
                VALUES
                    (" .  $id_usuarios . "," .  $row["id_metas"] . ", 'false')";
            $result2 = $mysqli->query($sql2);
        }
    }
    header('Location: ../home.php');
} else
    header('Location: ../index.php');

$mysqli->close();
