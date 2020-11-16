
function validar_nombre(input) {
    if (input.value.trim() != "" && isNaN(Number((input.value)[0]))) {
       
        valido(input);  
    } else {
        invalido(input);
    }
    submit_form();
}

function validar_descripcion(input) {
    if (input.value.trim() != "" && isNaN(Number((input.value)[0]))) {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}

function validar_codigo(input) {
    if (input.value.trim() != "") {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}

function validar_rubro(input) {
    if (input.value.trim() != "" && isNaN(Number((input.value)[0]))) {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}
function valido(input) {
    $(input).removeClass("is-invalid");
    $(input).addClass("is-valid");
    $(input).next().css("display", "none");
}
function invalido(input) {
    $(input).removeClass("is-valid");
    $(input).addClass("is-invalid");
    $(input).next().css("display", "block");
}


function submit_form() {
    if ($(".is-invalid").length == 0) {
        $("#btn_submit").removeAttr('disabled');
    } else {
        $("#btn_submit").attr('disabled', 'disabled');
    }
}
