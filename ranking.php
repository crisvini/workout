<?php
session_start();
include("./navbar.php");
// Seleciona a classificação e a pontuação do usuário no ranking
include("./mysql/conexao.php");
$sql = "SELECT
            _id_usuario,
            pontuacao,
            nome,
            RANK() OVER(ORDER BY pontuacao DESC) as ranking
        FROM 
            ranking";
$result = $mysqli->query($sql);
// Gera um array com os dados da classificação
$arrayRanking = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arrayUsuario = ["_id_usuario" =>  $row["_id_usuario"], "pontuacao" => $row["pontuacao"], "ranking" => $row["ranking"], "nome" => explode(" ", $row["nome"])[0] . " " . substr(explode(" ", $row["nome"])[1], 0, 1) . "."];
        array_push($arrayRanking, $arrayUsuario);
    }
}
// Salva o ranking e a pontuação do usuário em variáveis
$pontuacao = "";
$ranking = "";
$htmlRanking = "";
$arrayRankingUsuarios = [];
$nome = "";
foreach ($arrayRanking as $key => $value) {
    $pontuacao = $value["pontuacao"];
    $ranking = $value["ranking"];
    $nome = $value["nome"];
    if ($value["_id_usuario"] == $_SESSION["idUsuario"]) {
        $pontuacaoUsuario = $value["pontuacao"];
        $rankingUsuario = $value["ranking"];
        $htmlRanking = '
                        <div class="row mt-4 bg-light-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                            <div class="color-white d-flex flex-column fs-small fw-500">
                                <div class="row">
                                    <div class="col-1">
                                        <i class="fa-solid fa-circle-user color-white fs-large"></i>
                                    </div>
                                    <div class="col-7 ps-4">
                                        <span>' . $rankingUsuario . '° - Você</span>
                                    </div>
                                    <div class="col-4 text-end">
                                        <span>' . $pontuacaoUsuario . ' pontos</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
        array_push($arrayRankingUsuarios, $ranking);
        continue;
    }
    if ($ranking != "" && count($arrayRankingUsuarios) < 5 && $pontuacao != 0) {
        array_push($arrayRankingUsuarios, $ranking);
        $htmlRanking .= '
                <div class="row mt-2 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                    <div class="color-white d-flex flex-column fs-small fw-500">
                        <div class="row">
                            <div class="col-1">
                                <i class="fa-solid fa-circle-user color-white fs-large"></i>
                            </div>
                            <div class="col-7 ps-4">
                                <span>' . $ranking . ' - ' . $nome . '</span>
                            </div>
                            <div class="col-4 text-end">
                                <span>' . $pontuacao . ' pontos</span>
                            </div>
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
            <div class="row" id="titulo_ranking">
                <div class="col-12 color-white fs-large">
                    <span>Ranking semanal</span>
                </div>
            </div>
            <?= $htmlRanking; ?>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Minha pontuação semanal</span>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 color-white fs-extra-large color-pink mb-3">
                    <span><?= $pontuacaoUsuario; ?> pontos</span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>
    </div>

</body>

</html>
