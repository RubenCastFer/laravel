<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click & Car</title>
</head>

<body>
    <h2>Se ha confirmado la reserva</h2>
    <p>Tras efectuar el pago el {{date('d M Y', strtotime($datos->fecha_contrato))}}, la reserva ya se ha registrado en nuestro sistema.</p>
    <br>
    <h3>Detalles de la reserva</h3>
    
        <p>Titular: {{$datos->name}} {{$datos->apellidos}}</p>
        <p>Automóvil: {{$datos->marca}} {{$datos->modelo}}</p>
        <p>Fecha de recogida: {{date('d M Y', strtotime($datos->fecha_inicio))}}</p>
        <p>Fecha de devolución: {{date('d M Y', strtotime($datos->fecha_fin))}}</p>
        <p>Importe: {{$datos->precio_total}}€</p>
    
    <p>
        Recibe lleno el depósito y entrégalo lleno a la devolución. <br>
        Seguro de ocupantes del vehículo. <br>
        Cobertura básica de daños con franquicia (CDW). <br>
        IVA incluido. <br>
        <br>
        Gracias por depositar su confianza en nosotros.
    </p>

</body>

</html>