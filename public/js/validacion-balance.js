/*function fechas(input){
    if(input.value != "")
      {
        valido(input); 
        $(input).removeAttr("required");
    }
    else{
        invalido(input);
        $(input).prop("required", true);
    }
    submit_form();
    
}


function validar_fecha(input) {
    const RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/; 
    if ((input.value.match(RegExPattern)) && (input.value != '')) {
        let fecha = input.value.split("/");
        let day = fecha[0];
        let month = fecha[1];
        let year = fecha[2];
        if (month > 0 && month < 13 && year > 0 && year < 32768 && day > 0 && day <= (new Date(year, month, 0)).getDate()) {
            invalido(input)
        } else {
            valido(input);
        }
    } else {
        valido(input);
    }
    submit_form();
}

function monto(input) {
    const RegExPattern = /^\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})$/;
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
}*/

