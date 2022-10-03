<?php
session_start();
include("./mysql/conexao.php");
include("./navbar.php");
include("./header.php");
include("./verificaLogin.php");

// Consulta os dados das fichas
$sql = "SELECT
            fichas.nome,
            fichas.id_ficha,
            fichas.background
        FROM 
            fichas
        JOIN
            usuarios
        WHERE
            usuarios.cpf = '" . $_SESSION["cpf"] . "'
        AND 
            fichas._id_treino = '" . $_SESSION["_id_treino"] . "'
        AND
            usuarios.ultima_ficha_completa != fichas.id_ficha_anterior
        ORDER BY
            fichas.id_ficha
        ASC ";
$result = $mysqli->query($sql);

// Monta os cards das fichas
$htmlFichas = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql2 = "SELECT
                    COUNT(id_exercicio) as qtd_ex
                FROM 
                    exercicios
                WHERE
                    _id_ficha = '" . $row["id_ficha"] . "'";
        $quantidadeExercicios = mysqli_fetch_assoc(mysqli_query($mysqli, $sql2))["qtd_ex"];
        $htmlFichas .= '<div class="container mt-4vw ' . $row["background"] . ' image-disabled br-20" style="padding: 3%; height: 20vh;" id="ficha_' . $row["nome"] . '">
                            <div class="row py-3">
                                <div class="color-white fs-extra-large">
                                    <span>Ficha ' . $row["nome"] . '</span>
                                </div>
                            </div>
                            <div class="row mt-2vw">
                                <div class="color-white fs-small">
                                    <span><i class="fa-solid fa-heart-pulse me-3"></i>' . $quantidadeExercicios . ' exercícios</span>
                                </div>
                            </div>
                        </div>';
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen mb-5">
        <?= retornaHeader("home.php", "Nesta tela, são trazidas as suas fichas, cada ficha contém seus próprios exercícios. A primeira ficha é o seu treino do dia. A próxima ficha somente será liberada ao completar o treino do dia."); ?>
        <div class="container mt-4vw <?= $_SESSION["backgroundFichaDia"] ?> br-20" style="padding: 3%; height: 35vh !important;" id="treino_dia" onclick="load('treino.php')">
            <div class="row">
                <div class="color-white fs-medium">
                    <span>Treino do dia</span>
                </div>
            </div>
            <div class="row mt-4vw">
                <div class="color-white fs-extra-large">
                    <span>Ficha <?= $_SESSION["nomeFichaDoDia"]; ?></span>
                </div>
            </div>
            <div class="row mt-4vw" style="position: absolute; bottom: 66.5%">
                <div class="color-white fs-small">
                    <span><i class="fa-solid fa-heart-pulse me-3"></i><?= $_SESSION["quantidadeExercicios"]; ?> exercícios</span>
                </div>
            </div>
        </div>
        <div id="fichas">
            <?= $htmlFichas; ?>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>
    </div>

</body>

</html>