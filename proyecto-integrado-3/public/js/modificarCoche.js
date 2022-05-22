$(document).ready(function(){

  jQuery.validator.addMethod("matriculacorrecto", function(value, element) {
    return this.optional(element) || /^[\d]{4}[A-Z]{3}$/.test(value);
  }, "Por favor especifique una matricula valido.");

    $("#modificarCoche1, #modificarCoche2").validate({
        rules: {
          bastidor: {
            required: true,
            minlength: 17,
            maxlength: 17
          },
          marca: {
            required: true,
            minlength: 3,
            maxlength: 20
          },
          modelo: {
            required: true,
            minlength: 3,
            maxlength: 20
          },
          color: {
            required: true,
            minlength: 3,
            maxlength: 15
          },
          matricula: {
            required: true,
            matriculacorrecto: true
          },
          precio: {
            required: true,
            minlength: 1
          },
          archivo: {
            accept:"image/*",
            extension:"png|jpe?g|gif"
          }

        },
        messages : {
          bastidor: {
            required: "Campo requerido",
            minlength: "Debe contener 17 caracteres alfanuméricos",
            maxlength: "Debe contener 17 caracteres alfanuméricos"
          },
          marca: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 caracteres",
            maxlength: "Debe contener un máximo de 20 caracteres"
          },
          modelo: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 caracteres",
            maxlength: "Debe contener un máximo de 20 caracteres"
          },
          color: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 caracteres",
            maxlength: "Debe contener un máximo de 15 caracteres"
          },
          matricula: {
            required: "Campo requerido"
          },
          precio: {
            required: "Campo requerido"
          },
          archivo: {
            accept:"Tipo de archivo invalido",
            extension:"Tipo de archivo invalido"
          }
        }
      });

});