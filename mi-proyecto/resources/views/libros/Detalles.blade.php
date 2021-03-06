@extends('layouts.master')
@section('title','Detalles')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="card" style="width: 18rem; margin:auto; margin-top:10px">
            <div class="card-body">
                <h5 class="card-title">Detalles</h5>
                    <?php
                    echo "<p>Isbn: $libro->isbn</p>";
                    echo "<p>Titulo: $libro->titulo</p>";
                    echo "<p>Autor: $libro->autor</p>";
                    echo "<p>Idioma: $libro->idioma</p>";
                    echo "<p>Publicacion: $libro->publicacion</p>";
                    echo "<p>Editorial: $libro->editorial</p>";
                    ?>
            </div>
            <a href="/libros/DetallePDF/<?php echo $libro->isbn ?>" class="btn btn-primary m-3">Generar PDF</a>
        </div>
    </div>

</body>

</html>
@endsection