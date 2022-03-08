@extends('layouts.master')
@section('title','Nueva Pelicula')
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

    <div class="card" style="width: 18rem; margin:auto; margin-top:10px">
        <div class="card-body">
            <h5 class="card-title">Nueva Pelicula</h5>
            <form action="/pelis/PeliForm" method="POST">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                <input type="hidden" name="_token" value="csrf_token()">
                <label>Titulo:</label>
                <input type="text" name="titulo" placeholder="titulo" required><br>
                <label>Duracion:</label>
                <input type="number" name="duracion" placeholder="duracion" required><br>
                <label>Correo electrónico:</label>
                <input type="mail" name="email" placeholder="Correo electrónico" required><br>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>


</body>

@endsection