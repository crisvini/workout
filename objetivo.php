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
                    <i class="fa-solid fa-angle-left back-button" id="back_btn"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
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

        $("#back_btn, #finalizar_btn").click(function() {

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