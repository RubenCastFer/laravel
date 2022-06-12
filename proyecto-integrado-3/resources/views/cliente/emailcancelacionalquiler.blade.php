<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click & Car</title>
</head>

<body>
    <h2>Se ha confirmado la cancelación de su reserva</h2>
    <p>A {{date('d M Y', strtotime($datos->fecha_contrato))}} se procedera a la devolución del total del importe.</p>
    <br>
    <h3>Detalles de la reserva</h3>
    
        <p>Titular: {{$datos->name}} {{$datos->apellidos}}</p>
        <p>Automóvil: {{$datos->marca}} {{$datos->modelo}}</p>
        <p>Fecha de recogida: {{date('d M Y', strtotime($datos->fecha_inicio))}}</p>
        <p>Fecha de devolución: {{date('d M Y', strtotime($datos->fecha_fin))}}</p>
        <p>Importe: {{$datos->precio_total}}€</p>
    
    <p>
        Gracias por depositar su confianza en nosotros.
    </p>

</body>

</html>