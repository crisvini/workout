<?php
include("./navbar.php");
include("./header.php");
include("./verificaLogin.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <?= retornaHeader("ferramentas.php", "Para calcularmos a quantidade de água necessária diariamente, utilizamos a seguinte fórmula matemática: peso(kg) x 35. Nessa fórmula, cada quilo deve ser multiplicado por 35, onde 35 é a quantidade de mililitros de água necessários por quilo."); ?>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span>Calculadora de Hidratação</span>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 form-floating">
                    <input type="tel" class="form-control" style="border: 2px solid #292929 !important;" id="peso" maxlength="3" placeholder="peso" onchange="alertaPreenchimento('#peso', '#label_peso');">
                    <label for="peso" class="custom-label" id="label_peso" style="margin-left: 3% !important;">Peso (KG)</label>
                </div>
            </div>
            <div class="row mt-4vw">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" id="calcular">Calcular</button>
                </div>
            </div>
        </div>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;">
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