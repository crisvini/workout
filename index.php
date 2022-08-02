<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black overflow-hidden" id="body">

    <div id="slider" class="carousel slide entire-screen" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner">

            <div class="carousel-item active entire-screen" id="primeiro_slide">
                <div class="spacer"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="title-welcome">Bem-vindo ao</span>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15%;">
                        <div class="col-12 text-center">
                            <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 140px; line-height: normal;">Workout
                                <i class="fa-solid fa-dumbbell"></i></span>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 form-floating">
                            <input type="email" class="form-control" id="email" placeholder="email@email.com" maxlength="100" onchange="alertaPreenchimento('#email', '#label_email');">
                            <label for="email" class="custom-label" id="label_email">E-mail</label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-floating">
                            <i class="fa-solid fa-eye icon-eye d-none fs-medium" style="color: #fff7f8;" id="open_eye"></i>
                            <i class="fa-solid fa-eye-slash icon-eye d-block fs-medium" style="color: #fff7f8;" id="closed_eye"></i>
                            <input type="password" class="form-control" id="senha" placeholder="senha" onchange="alertaPreenchimento('#senha', '#label_senha');">
                            <label for="senha" class="custom-label" id="label_senha">Senha</label>
                        </div>
                    </div>
                    <div class="spacer"></div>
                    <div class="row w-90 m-auto mb-5 fixed-bottom">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="login_btn" disabled>Entrar</button>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <span class="link-login" style="text-decoration: underline;" onclick="$('#next').click()">Não tem uma conta?
                                Criar</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item entire-screen" id="segundo_slide">
                <div class="container mt-5" style="max-width: 100% !important;">
                    <div class="row pt-4 pb-4 bg-black">
                        <div class="col text-center">
                            <i class="fa-solid fa-angle-left back-button" onclick="$('#previous').click()"></i>
                            <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                                <i class="fa-solid fa-dumbbell"></i></span>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 form-floating">
                            <input type="text" class="form-control" id="nome" placeholder="Nome" onchange="alertaPreenchimento('#nome', '#label_nome');">
                            <label for="nome" class="custom-label" id="label_nome">Nome</label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-floating">
                            <input type="tel" class="form-control" id="cpf" placeholder="CPF" onchange="alertaPreenchimento('#cpf', '#label_cpf');">
                            <label for="cpf" class="custom-label" id="label_cpf">CPF</label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-floating">
                            <input type="tel" class="form-control" id="nascimento" placeholder="Nascimento" onchange="alertaPreenchimento('#nascimento', '#label_nascimento');">
                            <label for="nascimento" class="custom-label" id="label_nascimento">Nascimento</label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-floating">
                            <input type="email" class="form-control" id="cad_email" placeholder="email@email.com" maxlength="100" onchange="alertaPreenchimento('#cad_email', '#label_cad_email');">
                            <label for="cad_email" class="custom-label" id="label_cad_email">Email</label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-floating">
                            <i class="fa-solid fa-eye icon-eye d-none fs-medium" style="color: #fff7f8;" id="open_eye2"></i>
                            <i class="fa-solid fa-eye-slash icon-eye d-block fs-medium" style="color: #fff7f8;" id="closed_eye2"></i>
                            <input type="password" class="form-control" id="cad_senha" placeholder="senha" onchange="alertaPreenchimento('#cad_senha', '#label_cad_senha');">
                            <label for="cad_senha" class="custom-label" id="label_cad_senha">Senha</label>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-floating">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="termos" onchange="alertaPreenchimento('#termos', '#label_termos');">
                                <label class="form-check-label" for="termos" id="label_termos">Declaro que li e aceito
                                    os <span style="text-decoration: underline;" onclick="load('termos.php');">termos
                                        de
                                        uso e política de privacidade</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="spacer"></div>
                    <div class="row fixed-bottom w-90 m-auto mb-5">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="prosseguir_btn" disabled>Prosseguir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botões de prosseguir e voltar slide -->
        <button class="carousel-control-prev d-none" type="button" id="previous" data-bs-target="#slider" data-bs-slide="prev">
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next d-none" type="button" id="next" data-bs-target="#slider" data-bs-slide="next">
            <span class="visually-hidden">Next</span>
        </button>
        <!-- Botões de prosseguir e voltar slide -->
    </div>

    <script>
        $(document).ready(function() {

            const urlParams = new URLSearchParams(window.location.search);
            const page = urlParams.get('paginaAnterior');

            if (page == 'termos')
                $("#next").click();
            else
                sessionStorage.clear();

            // Atribui os valores da ssession aos campos
            if (sessionStorage.getItem("nome") != null)
                $("#nome").val(sessionStorage.getItem("nome"));
            if (sessionStorage.getItem("cpf") != null)
                $("#cpf").val(sessionStorage.getItem("cpf"));
            if (sessionStorage.getItem("nascimento") != null)
                $("#nascimento").val(sessionStorage.getItem("nascimento"));
            if (sessionStorage.getItem("cad_email") != null)
                $("#cad_email").val(sessionStorage.getItem("cad_email"));

            // Máscara dos campos
            $("#cpf").mask("000.000.000-00");
            $("#nascimento").mask("00/00/0000");

        });

        // Impede a digitação de caracteres inválidos
        $('#nome, #responsavel').bind('keyup blur', function() {
            var node = $(this);
            node.val(node.val().replace(/[¨*`!@#$%&()_={}[\]:;,.<>+\/?-]/, ''));
            node.val(node.val().replace(/[0-9]/g, ''));
        });
        $('#email, #cad_email').bind('keyup blur', function() {
            var node = $(this);
            node.val(node.val().replace(/[\s]/, ''));
        });

        // Mostra e esconde senha
        $("#closed_eye").on('click', function() {
            $("#closed_eye").removeClass("d-block");
            $("#closed_eye").addClass("d-none");
            $("#open_eye").removeClass("d-none");
            $("#open_eye").addClass("d-block");
            $("#senha").attr("type", "text");
        });
        $("#open_eye").on('click', function() {
            $("#open_eye").removeClass("d-block");
            $("#open_eye").addClass("d-none");
            $("#closed_eye").removeClass("d-none");
            $("#closed_eye").addClass("d-block");
            $("#senha").attr("type", "password");
        });

        // Mostra e esconde senha na tela de cadastro
        $("#closed_eye2").on('click', function() {
            $("#closed_eye2").removeClass("d-block");
            $("#closed_eye2").addClass("d-none");
            $("#open_eye2").removeClass("d-none");
            $("#open_eye2").addClass("d-block");
            $("#cad_senha").attr("type", "text");
        });
        $("#open_eye2").on('click', function() {
            $("#open_eye2").removeClass("d-block");
            $("#open_eye2").addClass("d-none");
            $("#closed_eye2").removeClass("d-none");
            $("#closed_eye2").addClass("d-block");
            $("#cad_senha").attr("type", "password");
        });

        // Habilita o botão de login se os campos de login estiverem preenchidos
        $("#email, #senha").on('input', function() {
            if ($("#email").val() != "" && $("#senha").val() != "" && validacaoEmail($("#email").val()) != false)
                $("#login_btn").attr("disabled", false);
            else
                $("#login_btn").attr("disabled", true);

        });

        // Valida os dados inseridos e faz login
        $("#login_btn").click(function() {

            if ($("#email").val() != "" && $("#senha").val() != "") {

                // Faz o login se os dados forem válidos
                if (validacaoEmail($("#email").val()) == false) {
                    Swal.fire({
                        title: 'Ops!',
                        text: 'E-mail inválido',
                        icon: 'error',
                        confirmButtonText: 'Entendi',
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
                    $("#email").val("");
                    alertaPreenchimento('#email', '#label_email');
                } else
                    load("home.php");


            } else {
                Swal.fire({
                    title: 'Ops!',
                    text: 'Preencha todos os campos para prosseguir',
                    icon: 'error',
                    confirmButtonText: 'Entendi',
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
            }

        })

        // // Aplica capitalize no campo de nome
        // $("#nome").on('change', function () {
        //     $("#nome").val($("#nome").val().charAt(0).toUpperCase() + $("#nome").val().slice(1));
        // });

        $("#nome, #cpf, #nascimento, #cad_email, #cad_senha, #termos").on('change', function() {
            // Salva os dados na session storage do javascript
            if ($(this).attr('id') == 'nome') {
                $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
                sessionStorage.setItem($(this).attr("id"), $(this).val());
            } else if ($(this).attr('id') != 'senha' && $(this).attr('id') != 'termos')
                sessionStorage.setItem($(this).attr("id"), $(this).val());
        });

        // Habilita o botão de prosseguir se todos os campos estiverem preenchidos
        $("#nome, #cpf, #nascimento, #cad_email, #cad_senha, #termos").on('input', function() {
            if ($("#nome").val() != "" && $("#cpf").val() != "" && $("#nascimento").val() != "" && $("#cad_email").val() != "" &&
                $("#cad_senha").val() != "" && $("#termos").prop("checked") == true)
                $("#prosseguir_btn").attr("disabled", false);
            else
                $("#prosseguir_btn").attr("disabled", true);
        });

        // Prossegue se todos os campos estão preenchidos e validados
        $("#prosseguir_btn").click(function() {
            if ($("#nome").val() != "" && $("#cpf").val() != "" && testaCpf($("#cpf").cleanVal()) != false && $("#nascimento").val() != "" && diffYearsNow($("#nascimento").val(), 12, 120) != false &&
                $("#cad_email").val() != "" && validacaoEmail($("#cad_email").val()) != false && $("#cad_senha").val() != "" && $("#termos").prop("checked") == true) {
                sessionStorage.setItem("cpf", $("#cpf").cleanVal());
                sessionStorage.setItem("cad_email", $("#cad_email").val());
                load("cadastroDadosPagamento.php");
            } else {
                alertaPreenchimento('#nome', '#label_nome');
                if (testaCpf($("#cpf").cleanVal()) == false || $("#cpf").val() == "") {
                    $("#cpf").val("");
                    alertaPreenchimento('#cpf', '#label_cpf');
                }
                if (diffYearsNow($("#nascimento").val(), 12, 120) == false || $("#nascimento").val() == "") {
                    $("#nascimento").val("");
                    alertaPreenchimento('#nascimento', '#label_nascimento');
                }
                if (validacaoEmail($("#cad_email").val()) == false || $("#cad_email").val() == "") {
                    $("#cad_email").val("");
                    alertaPreenchimento('#cad_email', '#label_cad_email');
                }
                alertaPreenchimento('#cad_senha', '#label_cad_senha');
                alertaPreenchimento('#termos', '#label_termos');

                Swal.fire({
                    title: 'Ops!',
                    text: 'Dados inválidos',
                    icon: 'error',
                    confirmButtonText: 'Entendi',
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
            }
        });

        // Valida data de nascimento
        function diffYearsNow(dt, min, max) {

            // Separa os dados da data informada e a atual
            var retorno = true;
            var dia = dt.substring(0, 2);
            var mes = dt.substring(3, 5);
            var ano = dt.substring(6, 10);
            var diaAtual = new Date().getDate();
            var mesAtual = new Date().getMonth() + 1;
            var anoAtual = new Date().getFullYear();
            var diffAnos = (anoAtual - ano);
            var diffMeses = (mesAtual - mes);
            var diffDias = (diaAtual - dia);
            var diasMes = new Date(ano, mes, 0).getDate();

            // Verifica se o dia e o mês inserido são validos
            var mesValido = false;
            var diaValido = false;
            if (mes <= 12) {
                mesValido = true;
            }
            if (dia <= diasMes) {
                diaValido = true;
            }

            if (mesValido == true && diaValido == true) {
                // Se o ano inserido for maior ou igual que o atual
                if (anoAtual < ano)
                    retorno = false;
                else if (anoAtual == ano && min != 0)
                    retorno = false;
                // Se a diferenÃ§a for menor que a minima e maior que a maxima
                else if (diffAnos < min || diffAnos > max)
                    retorno = false;
                // Se a diferenÃ§a for igual a minima, verifica os meses
                else if (diffAnos == min) {
                    // Se o mÃªs atual for menor, significa que nÃ£o possui a minima
                    if (mesAtual < mes)
                        retorno = false;
                    // Se o mÃªs inserido for o mesmo que o atual, verifica os dias
                    else if (mesAtual == mes) {
                        // Se o dia inserido for maior, significa que nÃ£o possui a minima
                        if (diaAtual < dia)
                            retorno = false;
                    }
                }
                // Se a diferenÃ§a for igual a maxima, verifica os meses
                else if (diffAnos == max) {
                    // Se o mÃªs atual for maior, significa que nÃ£o possui a maxima
                    if (mesAtual > mes)
                        retorno = false;
                    // Se o mÃªs inserido for o mesmo que o atual, verifica os dias
                    else if (mesAtual == mes) {
                        // Se o dia inserido for menor, significa que nÃ£o possui a maxima
                        if (diaAtual > dia)
                            retorno = false;
                    }
                }
            } else {
                retorno = false;
            }

            return retorno;
        }

        // Valida e-mail
        function validacaoEmail(email) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                if (isNaN(email.substr(email.length - 1, 1))) {
                    return (true)
                } else {
                    return (false)
                }
            }
            return (false)
        }
    </script>

</body>

</html>