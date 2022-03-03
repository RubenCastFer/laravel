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

    <div class="container">
        <h2 style="margin:auto">Listado de peticions</h2>
        <table class="table" style="margin:auto">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Titulo</th>
            </tr>

            @foreach ($peticiones as $peticion)
            <tr>
                <td>{{ $peticion->nombre }}</td>
                <td>{{ $peticion->mail }}</td>
                <td>{{ $peticion->titulo }}</td>
                <!-- <td>{{ $peticion->idioma }}</td>
                <td>{{ $peticion->publicacion }}</td>
                <td>{{ $peticion->editorial }}</td> -->
                <!-- <td><a href="/libros/Detalles/{{$peticion->isbn}}">Ver</a></td>
                <td><a href="/libros/Editar/{{$peticion->isbn}}">Editar</a></td>
                <td><a href="/libros/Eliminar/{{$peticion->isbn}}">Eliminar</a></td>
            </tr> -->

            @endforeach
        </table>
    </div>


</body>

@endsection