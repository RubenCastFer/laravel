@extends('layouts.master')
@section('title','Peliculas')
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
        <h2 style="margin:auto">Listado de Peliculas</h2>

        @if (empty($pelis))
        <div>
        <div class="card" style="width: 18rem; margin:auto; margin-top:10px">
            <div class="card-body">
                <h5 class="card-title">Detalles</h5>
                    <?php
                    
                    echo "<p>Titulo: $peli->titulo</p>";
                    echo "<p>Duracion: $peli->duracion</p>";
                    ?>
            </div>
            
        </div>
    </div>
        @else
        <table class="table" style="margin:auto">
            <tr>
                <th>Titulo</th>
                <th>Duracion</th>
                <th>Detalle</th>
                <th>Avisar</th>
            </tr>

            @foreach ($pelis as $peli)
            <tr>
                <td>{{ $peli->titulo }}</td>
                <td>{{ $peli->duracion }}</td>
                <td><a href="/pelis/Detalles/{{$peli->id}}">Ver</a></td>
                <td><a href="/pelis/Aviso/{{$peli->id}}">Aviso</a></td>

            </tr>

            @endforeach
        </table>
        @endif

    </div>


</body>

</html>

@endsection