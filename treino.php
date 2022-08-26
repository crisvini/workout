<?php
session_start();
include("./mysql/conexao.php");

// Consulta os dados das fichas
$sql = "SELECT
            id_exercicio,
            nome,
            repeticoes,
            descanso,
            _id_ficha
        FROM 
            exercicios
        WHERE
            _id_ficha = " . $_SESSION["idFichaDoDia"];
$result = $mysqli->query($sql);

// Monta os cards dos exercícios
$idExercicios = [];
$idExerciciosArray = [];
$idFicha = '';
$htmlExercicios = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idFicha = $row["_id_ficha"];
        array_push($idExercicios, "icone_feito_" . $row["id_exercicio"]);
        array_push($idExerciciosArray, $row["id_exercicio"]);
        $htmlExercicios .= '<div class="row my-5 bg-gray br-20">
                            <div class="col-4 ps-0 align-self-center">
                                <img src="./img/treino_background.jpg" class="w-100 br-st-20">
                            </div>
                            <div class="col-8 my-3 align-self-center px-3">
                                <div class="row pe-2 mb-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="color-white fs-small me-1">' . $row["nome"] . '</span>
                                        <i class="d-none fa-regular fa-circle fs-small color-white" id="icone_feito_' . $row["id_exercicio"] . '" onclick="finalizaExercicio(' . "'" . 'icone_feito_' . $row["id_exercicio"] . "'" . ');"></i>
                                    </div>
                                </div>
                                <div class="row pe-2 h-50">
                                    <div class="col-12 bg-pink br-20 py-2 text-center d-flex justify-content-between px-5">
                                        <div class="text-start">
                                            <span class="color-white fs-extra-small">' . $row["repeticoes"] . '</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="color-white fs-extra-small"><i class="fa-regular fa-clock color-white"></i>
                                            ' . $row["descanso"] . '</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
    }
    $idExercicios = json_encode($idExercicios);
}

// Seleciona as metas do usuário ainda não completas
$arrayMetasUsuarios = [];
$sql2 = "SELECT
            metas._id_exercicio,
            metas_usuarios.quantidade_concluida,
            metas_usuarios.completo
        FROM 
            metas_usuarios
        JOIN
            metas
        ON 
            metas_usuarios._id_metas = metas.id_metas
        WHERE
            metas_usuarios._id_usuarios = (SELECT id_usuarios FROM usuarios WHERE cpf = '" . $_SESSION["cpf"] . "')
        AND
            metas_usuarios.completo = 'false'";
$result2 = $mysqli->query($sql2);
if ($result2->num_rows > 0) {
    $cont = 0;
    while ($row2 = $result2->fetch_assoc()) {
        foreach ($idExerciciosArray as $key => $value) {
            if ($row2["_id_exercicio"] == $value) {
                $arrayQuantidadeCompleta = ["quantidade_ex_" . $cont =>  $row2["quantidade_concluida"], "ex_completo_" .
                    $cont => $row2["completo"], "id_exercicio" => $row2["_id_exercicio"]];
                array_push($arrayMetasUsuarios, $arrayQuantidadeCompleta);
            }
        }
        $cont++;
    }
}
echo json_encode($arrayMetasUsuarios);

die();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <div class="container h-50vh" style="max-width: 100% !important;">
            <div class="row py-4 <?= $_SESSION["backgroundFichaDia"]; ?> br-bt-20 h-100">
                <div class="col-12 px-2">
                    <div>
                        <i class="fa-solid fa-angle-left back-button-2" id="back_btn"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between w-100 mx-0 px-0" style="position: absolute; bottom: 51%">
                    <div class="col-6 px-3">
                        <div class="text-start">
                            <span class="fs-extra-large color-white pt-5 fw-500">Ficha <?= $_SESSION["nomeFichaDoDia"] ?></span>
                        </div>
                    </div>
                    <div class="col-6 px-3 d-none" id="div_timer">
                        <div class="text-end">
                            <span class="color-white fs-extra-large" id="timer">00:00:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="cardExercicios">
                <?= $htmlExercicios; ?>
            </div>
            <div class="spacer"></div>
            <div class="mt-5 bg-gray fixed-bottom border-light-gray">
                <div class="row py-4 w-50 mx-auto" id="div_btn_comecar_treino">
                    <div class="col text-white m-0 text-center color-white" id="btn_comecar_treino">
                        <button type="button" class="btn btn-primary w-50">Começar Treino</button>
                    </div>
                </div>
                <div class="row py-4 mx-5 d-none" id="div_btn_pausar_finalizar_treino">
                    <div class="col-6 m-0 text-start align-self-center" id="btn_pausar_treino">
                        <i class="fa-regular fa-circle-pause fs-extra-large color-white"></i>
                    </div>
                    <div class="col-6 m-0 text-start align-self-center d-none" id="btn_retomar_treino">
                        <i class="fa-regular fa-circle-play fs-extra-large color-white"></i>
                    </div>
                    <div class="col-6 m-0 text-end" id="btn_finalizar_treino">
                        <span class="fs-large color-white">Finalizar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./lib/easyTimer/easytimer.min.js"></script>
    <script>
        // Pega os Ids dos exercícios
        var idExercicios = JSON.parse('<?php echo $idExercicios; ?>');
        // Quantidade de exercícios
        var quantidadeExercicios = idExercicios.length;
        // Id dos exercícios concluídos
        var idExerciciosConcluidos = [];
        // Variável para verificar se o treino foi iniciado
        var treinoIniciado = false;

        // Inicializa o timer
        var timer = new easytimer.Timer();

        $("#btn_comecar_treino").click(() => {
            // Inicia o timer
            timer.start();
            $("#div_btn_comecar_treino").addClass("d-none");
            $("#div_btn_pausar_finalizar_treino, #div_timer").removeClass("d-none");

            // Remove o d-none dos botões de finalização de exercício
            var contador = 0;
            idExercicios.forEach(function() {
                $("#" + idExercicios[contador]).removeClass("d-none");
                contador++;
            });

            treinoIniciado = true;
        });

        $("#btn_pausar_treino").click(() => {
            // Pausa o timer
            timer.pause();
            $("#btn_pausar_treino").addClass("d-none");
            $("#btn_retomar_treino").removeClass("d-none");

            // Esconde os exercícios não concluídos
            var contador = 0;
            idExercicios.forEach(function() {
                $("#" + idExercicios[contador]).addClass("d-none");
                contador++;
            });
        });

        $("#btn_retomar_treino").click(() => {
            // Retoma o timer
            timer.start();
            $("#btn_pausar_treino").removeClass("d-none");
            $("#btn_retomar_treino").addClass("d-none");

            // Esconde os exercícios não concluídos
            var contador = 0;
            idExercicios.forEach(function() {
                $("#" + idExercicios[contador]).removeClass("d-none");
                contador++;
            });
        });

        $("#btn_finalizar_treino, #back_btn").click(() => {
            // Se o treino tiver sido iniciado, exibe o swal, caso contrário retorna para a home
            if (treinoIniciado == true) {
                // Finaliza o timer
                timer.stop();
                Swal.fire({
                    text: 'Tem certeza que deseja finalizar o treino?',
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
                        Swal.fire({
                            title: 'Parabéns!',
                            text: 'Seu treino do dia foi concluído',
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
                        }).then((result) => {
                            var settings = {
                                url: './ajax/finalizaTreino.php',
                                method: 'POST',
                                data: {
                                    idFicha: "<?= $idFicha; ?>"
                                },
                            }
                            $.ajax(settings).done(function(result) {
                                load("home.php");
                            });
                        });
                    }
                });
            } else
                load("home.php");

        });

        // Atualiza o timer a cada segundo
        timer.addEventListener('secondsUpdated', function(e) {
            $('#timer').html(timer.getTimeValues().toString());
        });

        function finalizaExercicio(id_exercicio) {
            id_exercicio = "#" + id_exercicio;
            $(id_exercicio).removeClass("fa-circle");
            $(id_exercicio).addClass("fa-circle-check");
            $(id_exercicio).removeAttr("onclick");
            idExerciciosConcluidos.push(id_exercicio.replace("#", ""));
            if (idExercicios.indexOf(id_exercicio.replace("#", "")) > -1)
                idExercicios.splice(idExercicios.indexOf(id_exercicio.replace("#", "")), 1);

            if (treinoIniciado == true) {
                // Finaliza o treino
                if (idExercicios.length == 0) {
                    Swal.fire({
                        title: 'Parabéns!',
                        text: 'Seu treino do dia foi concluído',
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
                    }).then((result) => {
                        var settings = {
                            url: './ajax/finalizaTreino.php',
                            method: 'POST',
                            data: {
                                idFicha: "<?= $idFicha; ?>"
                            },
                        }
                        $.ajax(settings).done(function(result) {
                            load("home.php");
                        });
                    });
                }
            }
        }
    </script>

</body>

</html>