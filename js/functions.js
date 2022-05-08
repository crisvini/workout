// Inicia o load
function load(page) {

    var html = '<div class="div-center" style="text-align: center; z-index: 5000;" id="load_spinner">' +
        '<div class="spinner-border" role="status" style="width: 150px; height: 150px;color: #e30b5c;">' +
        '<span class="visually-hidden">Loading...</span>' +
        '</div >' +
        '</div >' +
        '<div class="entire-screen div-center" style="z-index: 2; background-color: black; opacity: 0.3;" id="load_background">' +
        '</div > ';
    $("#body").append(html);

    if (page != undefined) {
        setTimeout(function () {
            location.href = page;
        }, 2000);
    }

}

// Para o load
function stopLoad() {
    $("#load_spinner, #load_background").remove();
}

// Mostra os campos que precisam ser preenchidos
function alertaPreenchimento(idCampo, idLabel) {
    if ($(idCampo).val() == "") {
        $(idLabel).addClass("alerta-label");
        $(idCampo).addClass("alerta-input");
    } else {
        $(idLabel).removeClass("alerta-label");
        $(idCampo).removeClass("alerta-input");
    }
}