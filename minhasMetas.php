<?php
include("./navbar.php");
include("./mysql/conexao.php");
session_start();

// Seleciona as pontuações do usuário
$sql = "SELECT 
            pontuacao_semanal,
            pontuacao_geral
        FROM 
            usuarios
        WHERE 
            cpf = '" . $_SESSION["cpf"] . "'";
$pontuacaoSemanal = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["pontuacao_semanal"] . " pontos";
$pontuacaoGeral = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["pontuacao_geral"] . " pontos";

// Seleciona as metas completas
$sql = "SELECT 
            metas_usuarios.completo as completo,
            metas.nome as nome,
            metas.descricao as descricao,
            metas.pontos as pontos,
            metas.quantidade as quantidade,
            metas_usuarios.quantidade_concluida as quantidadeConcluida
        FROM 
            metas_usuarios 
        JOIN 
                usuarios 
            on 
                usuarios.id_usuarios = metas_usuarios._id_usuarios 
        JOIN 
                metas 
            on 
                metas.id_metas = metas_usuarios._id_metas 
        WHERE 
            usuarios.cpf = '" . $_SESSION["cpf"] . "'
        AND
            metas_usuarios.completo = 'true'";
$result = $mysqli->query($sql);
// Monta os cards das metas completas
$htmlMetasCompletas = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $htmlMetasCompletas .= ' <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                                        <div class="col-12 br-20">
                                            <p class="color-white fs-medium fw-500 mb-0" style="line-height: 70px;">' . $row["descricao"] . '</p>
                                        </div>
                                        <div class="col-12 bg-black br-20 mt-4 d-flex justify-content-between">
                                            <span class="color-pink ps-4 fs-small fw-700 mb-0" style="line-height: 70px;">' . $row["pontos"] . ' pontos </span>
                                            <span class="color-pink pe-4 fs-small" style="align-self: center;"><i class="fa-solid fa-check"></i></span>
                                        </div>
                                    </div>';
    }
}

// Consulta os dados das metas incompletas
$sql = "SELECT 
            metas_usuarios.completo as completo,
            metas.nome as nome,
            metas.descricao as descricao,
            metas.pontos as pontos,
            metas.quantidade as quantidade,
            metas_usuarios.quantidade_concluida as quantidadeConcluida
        FROM 
            metas_usuarios 
        JOIN 
                usuarios 
            on 
                usuarios.id_usuarios = metas_usuarios._id_usuarios 
        JOIN 
                metas 
            on 
                metas.id_metas = metas_usuarios._id_metas 
        WHERE 
            usuarios.cpf = '" . $_SESSION["cpf"] . "'
        AND
            metas_usuarios.completo = 'false'";
$result = $mysqli->query($sql);
// Monta os cards das metas incompletas
$htmlMetasIncompletas = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $htmlMetasIncompletas .= ' <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                                        <div class="col-12 br-20">
                                            <p class="color-white fs-medium fw-500 mb-0" style="line-height: 70px;">' . $row["descricao"] . '</p>
                                        </div>
                                        <div class="col-12 progress br-20 mt-4" style="height: 80px;">
                                             <div class="progress-bar bg-light-gray text-start" role="progressbar" style="width: ' . ($row["quantidadeConcluida"] * 100) / $row["quantidade"] . '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                 <span class="color-medium-gray ms-4 fs-small fw-800" style="position: absolute;">' . $row["quantidadeConcluida"] . ' realizadas</span>
                                             </div>
                                         </div>
                                        <div class="col-12 bg-black br-20 mt-4 d-flex justify-content-between">
                                            <span class="color-pink ps-4 fs-small fw-700 mb-0" style="line-height: 70px;">' . $row["pontos"] . ' pontos </span>
                                            <span class="color-pink pe-4 fs-small" style="align-self: center;"><i class="fa-solid fa-star"></i></span>
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

    <div class="entire-screen">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-4 pb-4 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" onclick="load('home.php');"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large d-flex justify-content-between">
                    <span>Minhas metas</span>
                    <span><i class="fa-solid fa-list" style="align-self: center;"></i></span>
                </div>
            </div>
            <?= $htmlMetasIncompletas; ?>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large d-flex justify-content-between">
                    <span>Metas completas</span>
                    <span><i class="fa-solid fa-list-check" style="align-self: center;"></i></span>
                </div>
            </div>
            <?= $htmlMetasCompletas; ?>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large d-flex justify-content-between">
                    <span>Minha pontuação</span>
                    <span style="align-self: center;"><i class="fa-solid fa-star" style="align-self: center;"></i></span>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 br-20">
                    <p class="color-white fs-medium fw-500 mb-0" style="line-height: 70px;">Semanal</p>
                </div>
                <div class="col-12 ps-4 bg-black br-20 mt-4 fs-large color-pink mb-3">
                    <span><?= $pontuacaoSemanal; ?></span>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 br-20">
                    <p class="color-white fs-medium fw-500 mb-0" style="line-height: 70px;">Geral</p>
                </div>
                <div class="col-12 ps-4 bg-black br-20 mt-4 fs-large color-pink mb-3">
                    <span><?= $pontuacaoGeral; ?></span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>
    </div>

</body>

</html>