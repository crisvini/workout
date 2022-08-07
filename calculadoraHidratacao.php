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
                    <i class="fa-solid fa-angle-left back-button" onclick="load('ferramentas.php');"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span>Calculadora de Hidratação</span>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 form-floating">
                    <input type="tel" class="form-control" id="peso" maxlength="3" placeholder="peso" onchange="alertaPreenchimento('#peso', '#label_peso');">
                    <label for="peso" class="custom-label" id="label_peso">Peso (KG)</label>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" id="calcular">Calcular</button>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span class="color-pink">Resultado</span>
                </div>
            </div>
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span id="agua">?</span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar(); ?>
    </div>

    <script>
        $(document).ready(function() {
            $("#peso").mask("000");
        });

        $("#calcular").click(function() {
            if ($("#peso").val() != "")
                $("#agua").text("Você deve beber " + (parseFloat($("#peso").cleanVal()) * 35) + " ml de água por dia");
            else
                alertaPreenchimento('#peso', '#label_peso');
        });
    </script>

</body>

</html>