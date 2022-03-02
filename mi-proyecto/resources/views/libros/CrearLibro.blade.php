@extends('layouts.master')
@section('title','Crear Libro')
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
    <form action="/libros/CrearLibro" method="POST">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <input type="hidden" name="_token" value="csrf_token()">
        <label>Isbn:</label>
        <input type="number" name="isbn" placeholder="ISBN"><br>
        <label>Titulo:</label>
        <input type="text" name="titulo" placeholder="Titulo"><br>
        <label>Autor:</label>
        <input type="text" name="autor" placeholder="Autor"><br>
        <label>Idioma:</label>
        <input type="text" name="idioma" placeholder="Idioma"><br>
        <label>Publicacion:</label>
        <input type="date" name="publicacion"><br>
        <label>Editorial:</label>
        <input type="number" name="editorial" placeholder="Editorial"><br>
        <input type="submit" value="Guardar">
    </form>
</body>

</html>

@endsection
