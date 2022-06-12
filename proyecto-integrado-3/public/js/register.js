$(document).ready(function(){

  jQuery.validator.addMethod("dnicorrecto", function(value, element) {
    return this.optional(element) || /^[\d]{8}[a-zA-Z]$/.test(value);
  }, "Por favor especifique un DNI valido.");
  
    $("#registroCliente").validate({
        rules: {
          name : {
            required: true,
            minlength: 3,
            maxlength: 30
          },
          apellidos : {
            required: true,
            minlength: 3,
            maxlength: 30
          },
          email: {
            required: true,
            email: true
          },
          password : {
            required: true,
            minlength: 8,
            maxlength: 14
          },
          passwordConfirm : {
            required: true,
            minlength: 8,
            maxlength: 14,
            equalTo : "#password"
          },
          dni : {
            required: true,
            dnicorrecto: true
          },
          telefono : {
            required: true,
            minlength: 9,
            maxlength: 9
          },
          pais : {
            required: true,
            minlength: 3,
            maxlength: 30
          },
          provincia : {
            required: true,
            minlength: 3,
            maxlength: 30
          },
          ciudad : {
            required: true,
            minlength: 3,
            maxlength: 30
          },
          cp : {
            required: true,
            minlength: 5,
            maxlength: 5
          },
          calle : {
            required: true,
            minlength: 3,
            maxlength: 30
          }
        },
        messages : {
          name: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 letras",
            maxlength: "Debe contener un máximo de 30 letras"
          },
          apellidos: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 letras",
            maxlength: "Debe contener un máximo de 30 letras"
          },
          email: {
            required: "Campo requerido",
            email: "El email debe de seguir el siguiente formato: abc@domain.tld"
          },
          password: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 8 caracteres",
            maxlength: "Debe contener un máximo de 14 caracteres"
          },
          passwordConfirm: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 8 caracteres",
            maxlength: "Debe contener un máximo de 14 caracteres",
            equalTo: "Las contraseñas no coinciden"
          },
          telefono: {
            required: "Campo requerido",
            minlength: "Debe contener un número valido de 9 dígitos",
            maxlength: "Debe contener un número valido de 9 dígitos"
          },
          pais: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 letras",
            maxlength: "Debe contener un máximo de 30 letras"
          },
          provincia: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 letras",
            maxlength: "Debe contener un máximo de 30 letras"
          },
          ciudad: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 letras",
            maxlength: "Debe contener un máximo de 30 letras"
          },
          cp: {
            required: "Campo requerido",
            minlength: "Debe contener un número de 5 dígitos",
            maxlength: "Debe contener un número de 5 dígitos"
          },
          calle: {
            required: "Campo requerido",
            minlength: "Debe contener un mínimo de 3 letras",
            maxlength: "Debe contener un máximo de 30 letras"
          }
        }
      });

});