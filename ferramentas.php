<?php
session_start();
include("./navbar.php");
include("./header.php");
include("./verificaLogin.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <?= retornaHeader("home.php"); ?>
        <div class="container mt-3vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Ferramentas</span>
                </div>
            </div>
            <div class="row mt-3 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none" onclick="load('calculadoraImc.php');" id="imc">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-10 color-white fs-medium">
                            <span>IMC</span>
                        </div>
                        <div class="col-2 text-end align-self-center">
                            <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none" onclick="load('calculadoraHidratacao.php');" id="hidratacao">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-10 color-white fs-medium">
                            <span>Hidratação</span>
                        </div>
                        <div class="col-2 text-end align-self-center">
                            <span><i class="fa-solid fa-angle-right enter-button color-pink"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar(); ?>
    </div>

</body>

</html>