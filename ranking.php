<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Workout</title>
    <!-- JS -->
    <script src="./style/bootstrap5/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./lib/jquery/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./lib/jqueryMask/jquery.mask.js"></script>
    <script src="./lib/swal2/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="./js/functions.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./style/bootstrap5/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/styles.css">
    <link rel="stylesheet" href="./lib/swal2/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./style/fontAwesome/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-4 pb-4 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" onclick="load('home.php');"></i>
                    <span class="logo-font"
                        style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
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
        <div id="teste" class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20"
            style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
            <div class="row">
                <div class="col text-white m-0 text-center color-white fs-medium"
                    style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load('home.php')">
                    <i class="fa-solid fa-house color-pink"></i><br>
                    <span class="fs-extra-small">Início</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium"
                    style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load('fichas.php')">
                    <i class="fa-solid fa-dumbbell color-pink"></i><br>
                    <span class="fs-extra-small">Treino</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium"
                    style="border-right: 3px solid #a59b9c !important;" id="nav_metas"
                    onclick="load('minhasMetas.php')">
                    <i class="fa-solid fa-list-check color-pink"></i><br>
                    <span class="fs-extra-small">Metas</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium"
                    style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load('ranking.php')">
                    <i class="fa-solid fa-ranking-star color-pink"></i><br>
                    <span class="fs-extra-small color-pink">Ranking</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil"
                    onclick="load('perfil.php')">
                    <i class="fa-solid fa-circle-user color-pink"></i><br>
                    <span class="fs-extra-small">Perfil</span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>