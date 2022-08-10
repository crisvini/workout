<?php
session_start();
include("./navbar.php");
include("./mysql/conexao.php");

$fotoPerfil = '';
$sql = 'SELECT
            foto_perfil
        FROM
            usuarios
        WHERE
            cpf = "' . $_SESSION["cpf"] . '"';
if (mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["foto_perfil"] != null)
    $fotoPerfil = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["foto_perfil"];

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
                    <div class="crop mx-auto text-center d-flex justify-content-center">
                        <img src="<?= $fotoPerfil; ?>" id="foto_perfil">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6 mx-auto">
                    <div class="text-center bg-pink br-20">
                        <label class="label-upload color-white fs-small" id="label_foto_perfil"><i class="fa-solid fa-upload me-3"></i>Alterar foto de perfil</label>
                        <label for="foto_perfil_input" class="d-none" id="label_foto_perfil_hidden"></label>
                        <input class="input-submit d-none" type="file" value="Alterar foto de perfil" id="foto_perfil_input" accept="image/*">
                    </div>
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

        $("#label_foto_perfil").click(function() {
            $("#label_foto_perfil_hidden").click();
        });

        $("#foto_perfil_input").on("change", function() {
            var file = document.querySelector("#foto_perfil_input")['files'][0];
            var reader = new FileReader();
            let base64String = "";
            reader.onload = function() {
                base64String = reader.result.replace("data:", "").replace(/^.+,/, "");
                $("#foto_perfil").attr("src", 'data:image/png;base64,' + base64String);
                var settings = {
                    url: './ajax/fotoPerfil.php',
                    method: 'POST',
                    data: {
                        base64: 'data:image/png;base64,' + base64String
                    },
                }
                $.ajax(settings).done(function(result) {
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Foto de perfil alterada com êxito',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        width: '90%',
                        background: '#191919',
                        position: 'center',
                        customClass: {
                            confirmButton: 'btn btn-primary-swal-2',
                            title: 'title-swal',
                            popup: 'pop-up-swal',
                            container: 'container-swal-html'
                        }
                    });
                });
            }
            reader.readAsDataURL(file);
        });
    </script>

</body>

</html>