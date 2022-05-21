$(document).ready(function(){

    $("#paga").validate({
        rules: {
          titular: {
            minlength: 5,
            maxlength: 40
          },
          nTarjeta : {
            required: true,
            digits: true,
            minlength: 13,
            maxlength: 19
          },
          seguridad: {
            required: true,
            digits: true,
            minlength: 3,
            maxlength: 3
          },
          dd: {
            required: true,
            digits: true,
            min: 1,
            max: 31
          },
          MM: {
            required: true,
            digits: true,
            min: 1,
            max: 12
          },

        },
        messages : {
          titular: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 5 caracteres",
            maxlength: "Debe contener un máximo de 40 caracteres"
          },
          nTarjeta: {
            required: "Campo requerido",
            digits: "Introduzca solo dígitos",
            minlength: "Debe contener un mínimo de 13 dígitos",
            maxlength: "Debe contener un máximo de 19 dígitos"
          },
          seguridad: {
            required: "Campo requerido",
            digits: "Introduzca solo dígitos",
            minlength: "Valor incorrecto",
            maxlength: "Valor incorrecto"
          },
          dd: {
            required: "Campo requerido",
            digits: "Introduzca solo dígitos",
            min: "Valor incorrecto",
            max: "Valor incorrecto"
          },
          MM: {
            required: "Campo requerido",
            digits: "Introduzca solo dígitos",
            min: "Valor incorrecto",
            max: "Valor incorrecto"
          },
        }
      });

});