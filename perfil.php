<?php
session_start();
include("./navbar.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
    
    <style>
        .crop {
            width: 400px;
            height: 400px;
            overflow: hidden;
            border-radius: 100%;
        }

        .crop img {
            width: 700px;
            margin: -8% 0px 0px -36%;
            clip-path: circle(100%);
        }
    </style>
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
                    <div class="crop mx-auto">
                        <img src="./img/treino-peito.jpg">
                    </div>
                    //<i class="fa-solid fa-circle-user color-white" style="font-size: 280px;" id="perfil"></i>
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
    <?= navbar($_SERVER['REQUEST_URI']); ?>

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
