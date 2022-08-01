<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Workout</title>
    <!-- JS -->
    <script src="./style/bootstrap5/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./lib/jquery/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./lib/jqueryMask/jquery.mask.js"></script>
    <script src="./lib/swal2/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="./js/functions.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./style/bootstrap5/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/styles.css">
    <link rel="stylesheet" href="./lib/swal2/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./style/fontAwesome/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-4 pb-4 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" id="back_btn"></i>
                    <span class="logo-font"
                        style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large">
                    <span>Selecione seu objetivo</span>
                </div>
            </div>
            <div class="col-12 mt-5 form-floating">
                <select class="form-control" id="objetivo">
                    <option value="emagrecer">Emagrecimento</option>
                    <option value="hipertrofia">Hipertrofia</option>
                </select>
                <label for="plano" class="custom-label">Objetivo</label>
            </div>
        </div>
        <div class="row w-90 fixed-bottom m-auto mb-5">
            <div class="col-12">
                <button type="button" class="btn btn-primary" id="finalizar_btn">Finalizar</button>
            </div>
        </div>

    </div>

    <script>

        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('paginaAnterior');

        $("#back_btn, #finalizar_btn").click(function () {

            if (page == 'perfil') {
                if ($(this).attr("id") == "finalizar_btn") {
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
                        load('home.php');
                    });
                else
                    load('cadastroDadosPagamento.php');
            }
        });
    </script>

</body>

</html>