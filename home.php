<?php
session_start();
include("./navbar.php");

// Seleciona o id_usuario do usuário
include("./mysql/conexao.php");
if (!isset($_SESSION["idUsuario"])) {
    $sql = "SELECT id_usuarios FROM usuarios WHERE cpf = '" . $_SESSION["cpf"] . "'";
    $_SESSION["idUsuario"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["id_usuarios"];
}

include("./verificaLogin.php");

// Seleciona os dados da ficha do dia do usuário
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
            usuarios.ultima_ficha_completa = fichas.id_ficha_anterior";
$_SESSION["nomeFichaDoDia"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["nome"];
$_SESSION["idFichaDoDia"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["id_ficha"];
$_SESSION["backgroundFichaDia"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["background"];

// Seleciona a quantidade de exercícios da ficha do dia do usuário
$sql = "SELECT
            COUNT(id_exercicio) as qtd_ex
        FROM 
            exercicios
        WHERE
            _id_ficha = '" . $_SESSION["idFichaDoDia"] . "'";
$_SESSION["quantidadeExercicios"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["qtd_ex"];

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
        $arrayUsuario = ["_id_usuario" =>  $row["_id_usuario"], "pontuacao" => $row["pontuacao"], "ranking" => $row["ranking"]];
        array_push($arrayRanking, $arrayUsuario);
    }
}
// Salva o ranking e a pontuação do usuário em variáveis
$pontuacao = "";
$ranking = "";
foreach ($arrayRanking as $key => $value) {
    if ($value["_id_usuario"] == $_SESSION["idUsuario"]) {
        $pontuacao = $value["pontuacao"];
        $ranking = $value["ranking"];
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black overflow-hidden" id="body">

    <div class="entire-screen mb-5">
        <div class="container">
            <div class="row mt-4vw">
                <div class="col-10 text-start p-0">
                    <span class="color-white fs-medium" style="font-weight: 500; line-height: normal;"><span id="welcome"></span>,
                        <?= explode(" ", $_SESSION["nome"])[0]; ?></span>
                </div>
                <div class="col-2 text-end p-0">
                    <i class="fa-solid fa-circle-user color-white fs-large" onclick="load('perfil.php');" id="perfil"></i>
                </div>
            </div>
        </div>
        <div class="container mt-4vw">
            <div class="row">
                <div class="d-flex p-0" style="gap: 4vw;">
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="domingo">
                        D
                    </div>
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="segunda">
                        S
                    </div>
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="terca">
                        T
                    </div>
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="quarta">
                        Q
                    </div>
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="quinta">
                        Q
                    </div>
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="sexta">
                        S
                    </div>
                    <div class="fs-medium color-white text-center w-100 border-pink rounded-circle bg-gray" style="border: 4px solid;" id="sabado">
                        S
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4vw <?= $_SESSION["backgroundFichaDia"] ?> br-20" style="padding: 3%;" id="treino_dia" onclick="load('treino.php')">
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
            <div class="row mt-4vw">
                <div class="color-white fs-small">
                    <span><i class="fa-solid fa-heart-pulse me-3"></i><?= $_SESSION["quantidadeExercicios"]; ?> exercícios</span>
                </div>
            </div>
        </div>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;" onclick="load('minhasMetas.php');">
            <div class="row">
                <div class="col-10 color-white fs-large">
                    <span>Minhas metas</span>
                </div>
                <div class="col-2 text-end align-self-center">
                    <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;" id="ranking" onclick="load('ranking.php')">
            <div class="row">
                <div class="col-10 color-white fs-large">
                    <span>Ranking semanal</span>
                </div>
                <div class="col-2 text-end align-self-center">
                    <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                </div>
            </div>
            <div class="row mt-3vw bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span><?= $ranking; ?>° - Você</span>
                        </div>
                        <div class="col-4 text-end">
                            <span><?= $pontuacao; ?> pontos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;" id="ferramentas" onclick="load('ferramentas.php');">
            <div class="row">
                <div class="col-10 color-white fs-large">
                    <span>Ferramentas</span>
                </div>
                <div class="col-2 text-end align-self-center">
                    <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>

    </div>

    <script>
        $(document).ready(() => {
            // Altera o dia da semana
            const diasSemana = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];
            var dia = new Date();
            dia = diasSemana[dia.getDay()];
            if (dia == 'Domingo') {
                $("#domingo").removeClass("bg-gray");
                $("#domingo").addClass("bg-pink");
            } else if (dia == 'Segunda') {
                $("#segunda").removeClass("bg-gray");
                $("#segunda").addClass("bg-pink");
            } else if (dia == 'Terça') {
                $("#terca").removeClass("bg-gray");
                $("#terca").addClass("bg-pink");
            } else if (dia == 'Quarta') {
                $("#quarta").removeClass("bg-gray");
                $("#quarta").addClass("bg-pink");
            } else if (dia == 'Quinta') {
                $("#quinta").removeClass("bg-gray");
                $("#quinta").addClass("bg-pink");
            } else if (dia == 'Sexta') {
                $("#sexta").removeClass("bg-gray");
                $("#sexta").addClass("bg-pink");
            } else if (dia == 'Sábado') {
                $("#sabado").removeClass("bg-gray");
                $("#sabado").addClass("bg-pink");
            }

            // Altera o bom dia
            var hora = new Date();
            hora = hora.getHours();
            if (hora >= 0 && hora <= 11) {
                $("#welcome").text("Bom dia");
            } else if (hora >= 12 && hora <= 17) {
                $("#welcome").text("Boa tarde");
            } else if (hora >= 18 && hora <= 23) {
                $("#welcome").text("Boa noite");
            }

        });
    </script>

</body>

</html>