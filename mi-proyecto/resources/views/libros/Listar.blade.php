@extends('layouts.master')
@section('title','Libros')
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
    <h2>Listado de libros</h2>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Titulo</th>
            <th>Autora</th>
            <th>Idioma</th>
            <th>Publicacion</th>
            <th>Editorial</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        @foreach ($libros as $libro) 
        <tr>
            <td>{{ $libro->isbn }}</td>
            <td>{{ $libro->titulo }}</td>
            <td>{{ $libro->autor }}</td>
            <td>{{ $libro->idioma }}</td>
            <td>{{ $libro->publicacion }}</td>
            <td>{{ $libro->editorial }}</td>
            <td><a href="/libros/Detalles/{{$libro->isbn}}">Ver</a></td>
            <td><a href="/libros/Editar/{{$libro->isbn}}">Editar</a></td>
            <td><a href="/libros/Eliminar/{{$libro->isbn}}">Eliminar</a></td>
        </tr>
        
        @endforeach
    </table>

</body>
</html>

@endsection
