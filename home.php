<?php
session_start();
include("./navbar.php");

if (!isset($_SESSION["nomeFichaDia"])) {
    include("./mysql/conexao.php");
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

    $sql = "SELECT
                COUNT(id_exercicio) as qtd_ex
            FROM 
                exercicios
            WHERE
                _id_ficha = '" . $_SESSION["idFichaDoDia"] . "'";
    $_SESSION["quantidadeExercicios"] = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["qtd_ex"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen mb-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-10 text-start p-0">
                    <span class="color-white fs-medium" style="font-weight: 500; line-height: normal;"><span id="welcome"></span>,
                        <?= explode(" ", $_SESSION["nome"])[0]; ?></span>
                </div>
                <div class="col-2 text-end p-0">
                    <i class="fa-solid fa-circle-user color-white fs-large" onclick="load('perfil.php');" id="perfil"></i>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="d-flex gap-5 p-0">
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
        <div class="container mt-5 <?= $_SESSION["backgroundFichaDia"] ?> br-20" style="padding: 3%;" id="treino_dia" onclick="load('treino.php')">
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
            <div class="row mt-5">
                <div class="color-white fs-small">
                    <span><i class="fa-solid fa-heart-pulse me-3"></i><?= $_SESSION["quantidadeExercicios"]; ?> exercícios</span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;" onclick="load('minhasMetas.php');">
            <div class="row">
                <div class="col-10 color-white fs-large">
                    <span>Minhas metas</span>
                </div>
                <div class="col-2 text-end align-self-center">
                    <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                </div>
            </div>
            <div class="row mt-4" style="--bs-gutter-x: none;">
                <div class="progress br-20" style="height: 50px;">
                    <div class="progress-bar bg-pink text-start" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <span class="color-white ms-4 fs-small fw-500" style="position: absolute;">Flexões</span>
                    </div>
                </div>
            </div>
            <div class="row mt-5" style="--bs-gutter-x: none;">
                <div class="progress br-20" style="height: 50px;">
                    <div class="progress-bar bg-pink text-start" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        <span class="color-white ms-4 fs-small fw-500" style="position: absolute;">Abdominais</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;" id="ranking" onclick="load('ranking.php')">
            <div class="row">
                <div class="col-10 color-white fs-large">
                    <span>Ranking semanal</span>
                </div>
                <div class="col-2 text-end align-self-center">
                    <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span>1545° - Você</span>
                        </div>
                        <div class="col-4 text-end">
                            <span>6855 pontos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;" id="ferramentas" onclick="load('ferramentas.php');">
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