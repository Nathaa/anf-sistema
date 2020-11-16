function fechas(input){
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