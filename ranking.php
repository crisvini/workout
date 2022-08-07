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
                    <span>Ranking semanal</span>
                </div>
            </div>
            <div class="row mt-4 bg-light-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span>1545° - Você</span>
                        </div>
                        <div class="col-4 text-end">
                            <span>3500 pontos</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span>1546° - User 1835</span>
                        </div>
                        <div class="col-4 text-end">
                            <span>3298 pontos</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span>1547° - User 1395</span>
                        </div>
                        <div class="col-4 text-end">
                            <span>3220 pontos</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span>1548° - User 9564</span>
                        </div>
                        <div class="col-4 text-end">
                            <span>3165 pontos</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 bg-medium-gray br-20" style="padding: 4%; --bs-gutter-x: none">
                <div class="color-white d-flex flex-column fs-small fw-500">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-circle-user color-white fs-large"></i>
                        </div>
                        <div class="col-7 ps-4">
                            <span>1549° - User 4774</span>
                        </div>
                        <div class="col-4 text-end">
                            <span>3147 pontos</span>
                        </div>
                    </div>
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