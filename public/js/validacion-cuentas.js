
function validar(input) {
    if (input.value.trim() != "" && isNaN(Number((input.value)[0]))) {
       
        valido(input);  
    } else {
        invalido(input);
    }
    submit_form();
}

function validar_select(input){
    if(input.value != "")
      {
        valido(input); 
      }
    else{
        invalido(input);
    }
    submit_form();
}

function validar_numero(input) {
     const RegExPattern = /^\d{1,4}$/;
    if (input.value.trim() != "" && input.value.match(RegExPattern)) {
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
