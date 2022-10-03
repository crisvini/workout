<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// Arquivo de conexão
include("../mysql/conexao.php");

// Altera o objetivo na session
$_SESSION["_id_treino"] = explode("|", $_POST["objetivo"])[0];

// Altera o objetivo
$sql = "UPDATE 
            usuarios
        SET 
            _id_treino = '" . explode("|", $_POST["objetivo"])[0] . "',
            ultima_ficha_completa = " . explode("|", $_POST["objetivo"])[1] . "
        WHERE 
            cpf = '" .  $_SESSION["cpf"] . "'";
mysqli_query($mysqli, $sql);

// Zera a pontuação semanal do usuário e altera o _id_treino
$sql = "UPDATE 
            ranking
        SET 
            pontuacao = 0,
            _id_treino = " . explode("|", $_POST["objetivo"])[0] . "
        WHERE 
            _id_usuario = " .  $_SESSION["idUsuario"];
mysqli_query($mysqli, $sql);

// Deleta as metas do usuário
$sql = "DELETE FROM
            metas_usuarios
        WHERE
            _id_usuarios = " . $_SESSION["idUsuario"];
$result = $mysqli->query($sql);

// Seleciona as metas da tabela de metas
$sql = "SELECT
            *
        FROM 
            metas
        WHERE
            _id_treino = " . explode("|", $_POST["objetivo"])[0];
$result = $mysqli->query($sql);
// Insere as metas semanais na tabela de metas_usuarios no perfil do usuário
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql2 = "INSERT INTO 
                     metas_usuarios (_id_usuarios, _id_metas, completo, quantidade_concluida)
                 VALUES
                     (" .  $_SESSION["idUsuario"] . "," .  $row["id_metas"] . ", 'false', 0)";
        $mysqli->query($sql2);
    }
}

$mysqli->close();
