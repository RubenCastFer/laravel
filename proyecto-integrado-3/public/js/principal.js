$(document).ready(function () {

  var date = new Date();

  var day = date.getDate() + 1;
  var dayDevo = date.getDate() + 2;
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var reco = year + "-" + month + "-" + day + "T09:00";
  var devo = year + "-" + month + "-" + dayDevo + "T09:00";

  $("#recogida").attr("value", reco);
  $("#recogida").attr("min", reco);

  $("#devolucion").attr("value", devo);
  $("#devolucion").attr("min", devo);


  jQuery.validator.addMethod("fechadevo", function (value, element) {
    if ($("#recogida").val() < value) {
      return true;
    } else {
      return false;
    }
  }, "Por favor especifique una fecha valida.");

  $("#recogida").blur(function () {
    var fecha = new Date($('#recogida').val());
    var dia = fecha.getDate() + 1;
    var mes = fecha.getMonth() + 1;
    var anyo = fecha.getFullYear();

    if (mes < 10) mes = "0" + mes;
    if (dia < 10) dia = "0" + dia;

    var fechanueva = anyo + "-" + mes + "-" + dia + "T09:00";
    $("#devolucion").attr("value", fechanueva);
    $("#devolucion").attr("min", fechanueva);

  });


  $("#fechas").validate({
    rules: {
      recogida: {
        required: true,

      },
      devolucion: {
        required: true,
        fechadevo: true
      }

    },
    messages: {
      recogida: {
        required: "Campo requerido"
      },
      devolucion: {
        required: "Campo requerido"
      }
    }
  });

});