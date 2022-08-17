<?php
include("./navbar.php");
include("./mysql/conexao.php");
session_start();

// Consulta os dados das metas
$sql = "SELECT 
            metas_usuarios.completo as completo,
            metas.nome as nome,
            metas.descricao as descricao,
            metas.pontos as pontos
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

// Monta os cards das metas
$htmlMetasNaoCompletas = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $htmlMetasNaoCompletas .= ' <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                                        <div class="col-12 color-white fs-medium mb-3">
                                            <span>' . $row["nome"] . '</span>
                                        </div>
                                        <div class="col-10 progress br-20" style="height: 80px;">
                                            <div class="progress-bar bg-pink text-start" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <span class="color-white ms-4 fs-small fw-500" style="position: absolute;">' . $row["pontos"] . ' pontos</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <span class="color-pink fs-large float-end me-4" style="line-height: initial;"><i class="fa-solid fa-check"></i></span>
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
                <div class="col-12 color-white fs-large">
                    <span>Minhas metas</span>
                </div>
            </div>
            <?= $htmlMetasNaoCompletas; ?>
            <!-- <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 color-white fs-medium mb-3">
                    <span>Faça 100 flexões</span>
                </div>
                <div class="col-10 progress br-20" style="height: 80px;">
                    <div class="progress-bar bg-pink text-start" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <span class="color-white ms-4 fs-small fw-500" style="position: absolute;">Flexões</span>
                    </div>
                </div>
                <div class="col-2">
                    <span class="color-pink fs-large float-end me-4" style="line-height: initial;"><i class="fa-solid fa-check"></i></span>
                </div>
            </div> -->
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Metas completas</span>
                </div>
            </div>
            <div class="row mt-5 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 color-white fs-medium mb-3">
                    <span>Faça 120 abdominais</span>
                </div>
                <div class="col-10 progress br-20" style="height: 80px;">
                    <div class="progress-bar bg-pink text-start" role="progressbar" style="width: 100%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        <span class="color-white ms-4 fs-small fw-500" style="position: absolute;">Abdominais</span>
                    </div>
                </div>
                <div class="col-2">
                    <span class="color-pink fs-large float-end me-4" style="line-height: initial;"><i class="fa-solid fa-check-double"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Minha pontuação</span>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 color-white fs-extra-large color-pink mb-3">
                    <span>3500 pontos</span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>
    </div>

</body>

</html>