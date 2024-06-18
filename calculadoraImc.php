<?php
session_start();
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
        <?= retornaHeader("ferramentas.php", "Para calcularmos o IMC, utilizamos a seguinte fórmula matemática: peso(kg) / altura(m)². Nessa fórmula, os quilos devem ser divididos pela altura ao quadrado."); ?>
        <div class="container mt-4vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span>Calculadora de IMC</span>
                </div>
            </div>
            <div class="row mt-4vw">
                <div class="col-12 form-floating">
                    <input type="tel" class="form-control" style="border: 2px solid #202020" id="altura" maxlength="3" placeholder="altura" onchange="alertaPreenchimento('#altura', '#label_altura');">
                    <label for="altura" class="custom-label" id="label_altura" style="margin-left: 5% !important;">Altura (CM)</label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 form-floating">
                    <input type="tel" class="form-control" style="border: 2px solid #202020" id="peso" maxlength="3" placeholder="peso" onchange="alertaPreenchimento('#peso', '#label_peso');">
                    <label for="peso" class="custom-label" id="label_peso" style="margin-left: 5% !important;">Peso (KG)</label>
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
                    <span id="imc">?</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table text-white fs-1 mt-4vw d-none" id="tabela_imc">
                        <thead>
                            <tr>
                                <th scope="col" class="fw-bold fs-small">&nbsp;</th>
                                <th scope="col" class="fw-bold fs-small">IMC</th>
                                <th scope="col" class="fw-bold fs-small">PESO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="" id="linha1">
                                <th scope="row" class="fs-small">Magreza</th>
                                <td class="fs-small">
                                    < 18.5</td>
                                <td class="fs-small">
                                    < 59.9 Kg</td>
                            </tr>
                            <tr class="" id="linha2">
                                <th scope="row" class="fs-small">Normal</th>
                                <td class="fs-small">18.5 a 24.9</td>
                                <td class="fs-small">59.9 a 80.7 Kg</td>
                            </tr>
                            <tr class="" id="linha3">
                                <th scope="row" class="fs-small">Sobrepeso</th>
                                <td class="fs-small"> 24.9 a 30</td>
                                <td class="fs-small">80.7 a 97.2 Kg</td>
                            </tr>
                            <tr class="" id="linha4">
                                <th scope="row" class="fs-small">Obesidade</th>
                                <td class="fs-small">> 30</td>
                                <td class="fs-small">> 97.2 Kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar(); ?>
    </div>

    <script>
        $(document).ready(function() {
            $("#altura").mask("000");
            $("#peso").mask("000");
        });

        $("#calcular").click(function() {
            if ($("#altura").val() != "" && $("#peso").val() != "") {
                var imc = (parseFloat($("#peso").cleanVal()) / (parseFloat($("#altura").cleanVal()) * parseFloat($("#altura").cleanVal())) * 10000).toFixed(2);
                $("#imc").text("Seu IMC é de " + imc + " kg/m²");
                if (imc < 18.5) {
                    $("#linha1").addClass("bg-pink");
                    $("#linha2, #linha3, #linha4").removeClass("bg-pink");
                } else if (imc > 18.49 && imc < 25) {
                    $("#linha2").addClass("bg-pink");
                    $("#linha1, #linha3, #linha4").removeClass("bg-pink");
                } else if (imc > 24.99 && imc < 30) {
                    $("#linha3").addClass("bg-pink");
                    $("#linha1, #linha2, #linha4").removeClass("bg-pink");
                } else {
                    $("#linha4").addClass("bg-pink");
                    $("#linha1, #linha2, #linha3").removeClass("bg-pink");
                }
                $("#tabela_imc").removeClass("d-none");
            } else {
                if ($("#altura").val() == "") {
                    alertaPreenchimento('#altura', '#label_altura');
                }
                if ($("#peso").val() == "") {
                    alertaPreenchimento('#peso', '#label_peso');
                }
            }
        });
    </script>

</body>

</html>