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
                <form action="/libros/Editar/<?php echo $libro->isbn ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="csrf_token()">
                    <?php
                    echo "<p>Isbn: $libro->isbn</p>";
                    echo "<p>Titulo: $libro->titulo</p>";
                    echo "<p>Autor: $libro->autor</p>";
                    echo "<p>Idioma: $libro->idioma</p>";
                    echo "<p>Publicacion: $libro->publicacion</p>";
                    echo "<p>Editorial: $libro->editorial</p>";
                    ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
@endsection