$(document).ready(function(){

  jQuery('#passwordform').validate({
    rules : {
        password : {
            minlength : 8,
            maxlength: 14
        },
        passwordconfirm : {
            minlength : 8,
            maxlength: 14,
            equalTo : "#password"
        }
    },
        messages : {
          
          password: {
            minlength: "Debe contener un mínimo de 8 caracteres",
            maxlength: "Debe contener un máximo de 12 caracteres"
          },
          passwordconfirm: {
            minlength: "Debe contener un mínimo de 8 caracteres",
            maxlength: "Debe contener un máximo de 12 caracteres",
            equalTo: "Las contraseñas no coinciden"
          }
        }
      });

});