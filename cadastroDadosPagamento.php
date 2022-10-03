<?php
session_start();

// Redireciona para o index se o post cpf não existir
if (!isset($_POST["cpf"]))
    header('Location: ./');

// Insere os dados da página anterior na session do php
$_SESSION["nome"] = $_POST["nome"];
$_SESSION["cpf"] = $_POST["cpf"];
$_SESSION["nascimento"] = $_POST["nascimento"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["senha"] = $_POST["senha"];
include("./header.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <?= retornaHeader("home.php"); ?>
        <div class="container mt-4vw">
            <form method="post" action="./objetivo.php" id="cadastro_usuario">
                <div class="row">
                    <div class="col-12 p-0 form-floating">
                        <select name="plano" class="form-control" id="plano">
                            <option value="anual">Anual - R$ 10,00 por mês</option>
                            <option value="semestral">Semestral - R$ 12,00 por mês</option>
                            <option value="trimestral">Trimestral - R$ 14,00 por mês</option>
                            <option value="mensal">Mensal - R$ 15,00 por mês</option>
                        </select>
                        <label for="plano" class="custom-label">Plano</label>
                    </div>
                </div>
                <div class="row mt-4vw">
                    <div class="col-12 p-0 form-floating">
                        <input name="numero_cartao" type="tel" class="form-control" id="numero_cartao" placeholder="Número do cartão" onchange="alertaPreenchimento('#numero_cartao', '#label_numero_cartao');">
                        <label for="numero_cartao" class="custom-label" id="label_numero_cartao">Número do
                            cartão</label>
                    </div>
                </div>
                <div class="row mt-4vw">
                    <div class="col-12 p-0 form-floating">
                        <input name="titular" type="text" class="form-control" id="titular" placeholder="Titular do cartão" onchange="alertaPreenchimento('#titular', '#label_titular');">
                        <label for="titular" class="custom-label" id="label_titular">Titular do cartão</label>
                    </div>
                </div>
                <div class="row mt-4vw">
                    <div class="col-12 p-0 form-floating">
                        <input name="vencimento" type="tel" class="form-control" id="vencimento" placeholder="Vencimento" onchange="alertaPreenchimento('#vencimento', '#label_vencimento');">
                        <label for="vencimento" class="custom-label" id="label_vencimento">Vencimento</label>
                    </div>
                </div>
                <div class="row mt-4vw">
                    <div class="col-12 p-0 form-floating">
                        <input name="cvv" type="tel" class="form-control" id="cvv" placeholder="CVV" onchange="alertaPreenchimento('#cvv', '#label_cvv');" maxlength="4">
                        <label for="cvv" class="custom-label" id="label_cvv">CVV</label>
                    </div>
                </div>
                <div class="row mt-4vw">
                    <div class="col-12 p-0 form-floating">
                        <input name="cpf_titular" type="tel" class="form-control" id="cpf_titular" placeholder="CPF do titular" onchange="alertaPreenchimento('#cpf_titular', '#label_cpf_titular');">
                        <label for="cpf_titular" class="custom-label" id="label_cpf_titular">CPF do titular</label>
                    </div>
                </div>
            </form>
            <div class="row mt-4vw">
                <div class="col-12 p-0 form-floating">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="termos" onchange="alertaPreenchimento('#termos', '#label_termos');">
                        <label class="form-check-label" for="check1">Entendo que é uma cobrança
                            recorrente e que o plano não pode ser cancelado ou reembolsado durante sua
                            duração</label>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="row mb-4vw m-auto">
                <div class="col-12 p-0">
                    <button type="submit" class="btn btn-primary" id="assinar_btn" disabled>Assinar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Máscara dos campos
            $("#numero_cartao").mask("0000 0000 0000 0000");
            $("#vencimento").mask("00/0000");
            $("#cvv").mask("000");
            $("#cpf_titular").mask("000.000.000-00");

            // Impede a digitação de caracteres inválidos
            $('#titular').bind('keyup blur', function() {
                var node = $(this);
                node.val(node.val().replace(/[¨*`!@#$%&()_={}[\]:;,.<>+\/?-]/, ''));
                node.val(node.val().replace(/[0-9]/g, ''));
            });

            // Habilita o botao se todos os campos estiverem preenchidos
            $('#plano, #numero_cartao, #titular, #vencimento, #cvv, #cpf_titular, #termos').on('input', function() {

                var numeroCartao = $("#numero_cartao").cleanVal();
                var cvv = $("#cvv").cleanVal();

                if ($("#plano").val() != "" && $("#numero_cartao").val() != "" && numeroCartao.length == 16 && $("#titular").val() != "" && $("#vencimento").val() != "" && $("#cvv").val() != "" &&
                    cvv.length == 3 && $("#cpf_titular").val() != "" && testaCpf($("#cpf_titular").cleanVal()) != false && $("#termos").prop("checked") == true) {
                    $('#assinar_btn').prop('disabled', false);
                } else {
                    $('#assinar_btn').prop('disabled', true);
                }

            });

            // Faz o usuário quando o cliente realiza a assinatura
            $('#assinar_btn').click(function() {
                $("#cadastro_usuario").submit();
            });

        });
    </script>

</body>

</html>