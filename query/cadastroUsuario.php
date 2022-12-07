<?php
// Arquivo de conexão
include("../mysql/conexao.php");
include("../fotoPerfilPadrao.php");

session_start();
// Insere os dados da página anterior na session do php
$_SESSION["_id_treino"] = explode("|", $_POST["objetivo"])[0];
$fotoPerfilPadrao = fotoPerfilPadrao();

// Cria o usuário na tabela usuarios
$sql =
    "INSERT INTO 
        usuarios (nome, email, cpf, nascimento, senha, _id_treino, ultima_ficha_completa, foto_perfil, _id_perfil) 
    VALUES 
        ('" . $_SESSION['nome'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['cpf'] . "', '" . $_SESSION['nascimento'] . "', MD5('" . $_SESSION['senha'] . "'),
         '" . $_SESSION['_id_treino'] . "', '" . explode("|", $_POST["objetivo"])[1] . "', '" . $fotoPerfilPadrao . "', 1)";

// Se o usuário for criado com sucesso, insere as metas semanais na tabela de metas_usuarios no perfil do usuário
if ($mysqli->query($sql) === true) {
    // Seleciona o id do usuário
    $sql =
        "SELECT
            id_usuarios
        FROM 
            usuarios
        WHERE
            cpf = '" . $_SESSION['cpf'] . "'";
    $id_usuarios = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["id_usuarios"];

    // Seleciona as metas
    $sql =
        "SELECT
            *
        FROM 
            metas
        WHERE
            _id_treino = " . $_SESSION['_id_treino'];
    $result = $mysqli->query($sql);
    // Insere as metas semanais na tabela de metas_usuarios no perfil do usuário
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql2 =
                "INSERT INTO 
                    metas_usuarios (_id_usuarios, _id_metas, completo, quantidade_concluida)
                VALUES
                    (" .  $id_usuarios . "," .  $row["id_metas"] . ", 'false', 0)";
            $mysqli->query($sql2);
        }
    }

    // Insere os dados do usuário no ranking
    $sql =
        "INSERT INTO 
            ranking (_id_usuario, nome, pontuacao, _id_treino)
        VALUES
            (" .  $id_usuarios . ",'" .  $_SESSION['nome'] . "', 0, " . $_SESSION["_id_treino"] . ")";
    $result = $mysqli->query($sql);


    $mysqli->close();
    header('Location: ../home.php');
} else {
    $mysqli->close();
    header('Location: ../index.php');
}
