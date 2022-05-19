$(document).ready(function(){

    $("#loginCliente, #loginEmpleado").validate({
        rules: {
          email: {
            required: true,
            email: true
          },
          password : {
            required: true,
            minlength: 8,
            maxlength: 14
          }

        },
        messages : {
          email: {
            email: "El email debe de seguir el siguiente formato: abc@domain.tld"
          },
          password: {
            minlength: "Debe contener un mínimo de 8 caracteres",
            maxlength: "Debe contener un máximo de 12 caracteres"
          }
        }
      });

});