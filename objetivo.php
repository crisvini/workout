<?php
include("./mysql/conexao.php");
session_start();

// Insere os dados na session do php
if (!isset($_GET["paginaAnterior"])) {
    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["cpf"] = $_POST["cpf"];
    $_SESSION["nascimento"] = $_POST["nascimento"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["senha"] = $_POST["senha"];
} else
    include("./verificaLogin.php");

// Busca os objetivos
$sql = "SELECT
            id_treino,
            nome,
            ultima_ficha_completa
        FROM 
            treinos";
$result = $mysqli->query($sql);
// Monta as options dos objetivos
$optionsObjetivos = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $optionsObjetivos .= '<option value="' . $row['id_treino'] . '|' . $row['ultima_ficha_completa'] . '" id="' . $row['nome'] . '">' . $row['nome'] . '</option>';
    }
}
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-2 pb-2 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" id="back_btn"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 10vw; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Selecione seu objetivo</span>
                </div>
            </div>
            <form method="post" action="./query/cadastroUsuario.php" id="cadastro_usuario">
                <div class="col-12 mt-4vw form-floating">
                    <select name="objetivo" class="form-control" id="objetivo" style="border: 2px solid #292929 !important; padding: 3vw 0px 0vw 3vw;">
                        <?= $optionsObjetivos; ?>
                    </select>
                    <label for="plano" class="custom-label">Objetivo</label>
                </div>
            </form>
        </div>
        <div class="row w-90 fixed-bottom m-auto mb-4vw">
            <div class="col-12">
                <button type="submit" class="btn btn-primary" id="finalizar_btn">Finalizar</button>
            </div>
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('paginaAnterior');

        $("#back_btn, #finalizar_btn").click(function(event) {
            event.preventDefault();

            if (page == 'perfil') {
                if ($(this).attr("id") == "finalizar_btn") {

                    if ($("#objetivo").val().split("|")[0] == '<?= (string) $_SESSION["_id_treino"]; ?>') {
                        Swal.fire({
                            text: 'Seu objetivo atual já é ' + $("#objetivo option:selected").text().toLowerCase() + '!',
                            icon: 'warning',
                            confirmButtonText: 'Ok',
                            width: '90%',
                            background: '#191919',
                            position: 'center',
                            customClass: {
                                confirmButton: 'btn btn-secondary-swal-2',
                                title: 'title-swal',
                                popup: 'pop-up-swal',
                                container: 'container-swal-html'
                            }
                        });
                    } else {
                        Swal.fire({
                            text: 'Sua pontuação será zerada ao alterar o objetivo, deseja prosseguir?',
                            icon: 'warning',
                            confirmButtonText: 'Sim',
                            cancelButtonText: 'Não',
                            showCancelButton: true,
                            width: '90%',
                            background: '#191919',
                            position: 'center',
                            customClass: {
                                confirmButton: 'btn btn-secondary-swal-2',
                                cancelButton: 'btn btn-primary-swal-2',
                                title: 'title-swal',
                                popup: 'pop-up-swal',
                                container: 'container-swal-html'
                            }
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                load();
                                var settings = {
                                    url: './ajax/alteraObjetivo.php',
                                    method: 'POST',
                                    data: {
                                        objetivo: $("#objetivo").val()
                                    },
                                }
                                $.ajax(settings).done(function(result) {
                                    stopLoad();
                                    Swal.fire({
                                        text: 'Seu treino foi alterado com sucesso!',
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
                                    }).then(() => {
                                        load('home.php');
                                    });
                                });
                            } else
                                load('perfil.php');
                        });
                    }
                } else if ($(this).attr("id") == "back_btn")
                    load('perfil.php');
            } else {
                if ($(this).attr("id") == "finalizar_btn")
                    Swal.fire({
                        text: 'Seu treino foi criado com sucesso!',
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
                    }).then(() => {
                        $("#cadastro_usuario").submit();
                    });
                else
                    load('cadastroDadosPagamento.php');
            }
        });
    </script>

</body>

</html>