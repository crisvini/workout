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
            <div class="row mt-4 bg-medium-gray p-4 br-20" style="--bs-gutter-x: none;">
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
            </div>
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
        <div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
            <div class="row">
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load('home.php')">
                    <i class="fa-solid fa-house color-pink"></i><br>
                    <span class="fs-extra-small">Início</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load('fichas.php')">
                    <i class="fa-solid fa-dumbbell color-pink"></i><br>
                    <span class="fs-extra-small">Treino</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load('minhasMetas.php')">
                    <i class="fa-solid fa-list-check color-pink"></i><br>
                    <span class="fs-extra-small color-pink">Metas</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load('ranking.php')">
                    <i class="fa-solid fa-ranking-star color-pink"></i><br>
                    <span class="fs-extra-small">Ranking</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load('perfil.php')">
                    <i class="fa-solid fa-circle-user color-pink"></i><br>
                    <span class="fs-extra-small">Perfil</span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>