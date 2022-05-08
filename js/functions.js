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

// Valida cpf
function testaCpf(documento) {
    if (documento.length == 11) {
        var Soma;
        var Resto;
        Soma = 0;
        // Elimina CPF invalidos conhecidos
        if (documento == "00000000000" || documento == "11111111111" || documento == "22222222222" || documento == "33333333333" || documento == "44444444444" || documento == "55555555555" || documento == "66666666666" || documento == "77777777777" || documento == "88888888888" || documento == "99999999999")
            return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(documento.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(documento.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(documento.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(documento.substring(10, 11))) return false;
        return true;
    } else {
        return false;
    }
}