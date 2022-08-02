<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen mb-5">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-4 pb-4 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" onclick="load('home.php');"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container h-25 mt-5 bg-peito br-20" style="padding: 3%;" id="treino_dia" onclick="load('treino.php')">
            <div class="row">
                <div class="color-white fs-medium">
                    <span>Treino do dia</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="color-white fs-extra-large">
                    <span>Ficha A</span>
                </div>
            </div>
            <div class="row mt-5" style="position: absolute; bottom: 66.5%">
                <div class="color-white fs-small">
                    <span><i class="fa-solid fa-heart-pulse me-3"></i>9 exercícios</span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-triceps image-disabled br-20" style="padding: 3%;" id="treino_dia" onclick="load('treino.php')">
            <div class="row py-5">
                <div class="color-white fs-extra-large">
                    <span>Ficha B</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="color-white fs-small">
                    <span><i class="fa-solid fa-heart-pulse me-3"></i>11 exercícios</span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-biceps image-disabled br-20" style="padding: 3%;" id="treino_dia" onclick="load('treino.php')">
            <div class="row py-5">
                <div class="color-white fs-extra-large">
                    <span>Ficha C</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="color-white fs-small">
                    <span><i class="fa-solid fa-heart-pulse me-3"></i>10 exercícios</span>
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
                    <span class="fs-extra-small color-pink">Treino</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load('minhasMetas.php')">
                    <i class="fa-solid fa-list-check color-pink"></i><br>
                    <span class="fs-extra-small">Metas</span>
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

    <script>
        $(document).ready(() => {

            // Mostra o dia da semana
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

        });
    </script>

</body>

</html>