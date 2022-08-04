<?php
session_start();
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
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center">
                    <i class="fa-solid fa-circle-user color-white" style="font-size: 280px;" id="perfil"></i>
                </div>
            </div>
            <div class="row mt-5 mb-1">
                <div class="col-12 text-center color-white">
                    <span class="fs-large"><?= $_SESSION["nome"]; ?></span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 text-center color-white">
                    <span class="fs-small"><strong>E-mail: </strong><?= $_SESSION["email"]; ?></span>
                </div>
            </div>
        </div>
    </div>
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
                <span class="fs-extra-small">Metas</span>
            </div>
            <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load('ranking.php')">
                <i class="fa-solid fa-ranking-star color-pink"></i><br>
                <span class="fs-extra-small">Ranking</span>
            </div>
            <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load('perfil.php')">
                <i class="fa-solid fa-circle-user color-pink"></i><br>
                <span class="fs-extra-small color-pink">Perfil</span>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary" onclick="load('objetivo.php?paginaAnterior=perfil')">Alterar
                    objetivo</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary" id="sair_btn">Sair</button>
            </div>
        </div>
    </div>

    <script>
        $("#sair_btn").click(function() {
            Swal.fire({
                text: 'Tem certeza que deseja sair?',
                icon: 'warning',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não',
                showCancelButton: true,
                width: '90%',
                background: '#191919',
                position: 'center',
                customClass: {
                    cancelButton: 'btn btn-primary-swal-2',
                    confirmButton: 'btn btn-secondary-swal-2',
                    title: 'title-swal',
                    popup: 'pop-up-swal',
                    container: 'container-swal-html'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    load("index.php");
                }
            })
        });
    </script>

</body>

</html>