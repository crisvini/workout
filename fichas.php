<?php
session_start();
include("./mysql/conexao.php");
include("./navbar.php");

// Seleciona o idTreino(objetivo) 
$sql = "SELECT
            treinos.id_treino
        FROM 
            treinos
        JOIN
            usuarios
        WHERE
            usuarios.cpf = '" . $_SESSION["cpf"] . "'
        AND 
            usuarios.objetivo = treinos.objetivo";
$_SESSION["idTreino"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["id_treino"];

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
            fichas._id_treino = '" . $_SESSION["idTreino"] . "'
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
        $htmlFichas .= '<div class="container mt-5 ' . $row["background"] . ' image-disabled br-20" style="padding: 3%;" id="ficha_' . $row["nome"] . '">
                            <div class="row py-5">
                                <div class="color-white fs-extra-large">
                                    <span>Ficha ' . $row["nome"] . '</span>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="color-white fs-small">
                                    <span><i class="fa-solid fa-heart-pulse me-3"></i>' . $quantidadeExercicios . ' exercícios</span>
                                </div>
                            </div>
                        </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen mb-5">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-4 pb-4 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" onclick="load('home.php');"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container h-25 mt-5 <?= $_SESSION["backgroundFichaDia"] ?> br-20" style="padding: 3%;" id="treino_dia" onclick="load('treino.php')">
            <div class="row">
                <div class="color-white fs-medium">
                    <span>Treino do dia</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="color-white fs-extra-large">
                    <span>Ficha <?= $_SESSION["nomeFichaDoDia"]; ?></span>
                </div>
            </div>
            <div class="row mt-5" style="position: absolute; bottom: 66.5%">
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