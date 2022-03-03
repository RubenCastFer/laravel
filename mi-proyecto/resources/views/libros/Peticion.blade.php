@extends('layouts.master')
@section('title','Peticiones')
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
            <h5 class="card-title">Peticion</h5>
            <form action="/libros/Peticion" method="POST">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                <input type="hidden" name="_token" value="csrf_token()">
                <label>Nombre y Apellidos:</label>
                <input type="text" name="nombre" placeholder="Nombre y Apellidos" required><br>
                <label>Correo electrónico:</label>
                <input type="mail" name="mail" placeholder="Correo electrónico" required><br>
                <label>Título del libro:</label>
                <input type="text" name="titulo" placeholder="Título del libro" required><br>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>


</body>

@endsection