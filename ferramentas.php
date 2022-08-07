<?php
include("./navbar.php");
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
                    <span>Ferramentas</span>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none" onclick="load('calculadoraImc.php');" id="imc">
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
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none" onclick="load('calculadoraHidratacao.php');" id="hidratacao">
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