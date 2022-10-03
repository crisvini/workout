<?php
session_start();
include("./navbar.php");
include("./header.php");
include("./mysql/conexao.php");
include("./verificaLogin.php");

// Seleciona a classificação e a pontuação do usuário no ranking
$sql = "SELECT 
            _id_usuario,
            pontuacao,
            nome,
            @curRank := @curRank + 1 AS ranking 
        FROM
            ranking,
            (SELECT @curRank := 0) r 
        WHERE
            _id_treino = " . $_SESSION["_id_treino"] . "
        ORDER BY 
            pontuacao DESC";
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
                        <div class="row mt-3 bg-light-gray br-20" style="padding: 4%; --bs-gutter-x: none">
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
                                <span>' . $ranking . '° - ' . $nome . '</span>
                            </div>
                            <div class="col-4 text-end">
                                <span>' . $pontuacao . ' pontos</span>
                            </div>
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

    <div class="entire-screen">
        <?= retornaHeader("home.php", "O ranking e a pontuação são atualizados semanalmente. No ranking semanal, é trazido sua colocação e pontuação atual e a pontuação e colocação dos 4 usuários subsequentes."); ?>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;">
            <div class="row" id="titulo_ranking">
                <div class="col-12 color-white fs-large">
                    <span>Ranking semanal</span>
                </div>
            </div>
            <?= $htmlRanking; ?>
        </div>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Minha pontuação semanal</span>
                </div>
            </div>
            <div class="row mt-3 bg-medium-gray p-2 br-20" style="--bs-gutter-x: none;">
                <div class="col-12 color-white fs-extra-large color-pink">
                    <span><?= $pontuacaoUsuario; ?> pontos</span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>
    </div>

</body>

</html>
