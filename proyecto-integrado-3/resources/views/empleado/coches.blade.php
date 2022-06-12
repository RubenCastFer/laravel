@extends('layouts.masterEmpleado')
@section('title','Coches')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Coches</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-3">
                <h1 class="text-center m-5">Coches</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif


            </div>
            <div class="col-12 col-lg-3 position-relative">
                <a class="btn btn-success position-absolute bottom-0 end-0" href="/empleado/modificarcoche/null">Añadir nuevo coche</a>
            </div>
            <table class="table" style="margin:auto">
                <tr>
                    <th>Nº Coche</th>
                    <th>Bastidor</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Matricula</th>
                    <!-- <th>Imagen</th> -->
                    <th>Estado</th>
                    <th>Precio/Día</th>
                    <th>Editar</th>
                    <th>Borrar</th>

                </tr>
                @foreach ($coches as $coche)
                <tr>
                    <td>{{ $coche->id_Coche }}</td>
                    <td>{{ $coche->bastidor }}</td>
                    <td>{{ $coche->marca }}</td>
                    <td>{{ $coche->modelo }}</td>
                    <td>{{ $coche->color }}</td>
                    <td>{{ $coche->matricula }}</td>
                    <!-- <td>{{ $coche->imagen }}</td> -->
                    <td>{{ $coche->estado }}</td>
                    <td>{{ $coche->precio }}€</td>
                    <td><a class="btn btn-primary" href="/empleado/modificarcoche/{{ $coche->id_Coche }}">Editar</a></td>
                    <td><a class="btn btn-danger" href="/empleado/eliminarcoche/{{ $coche->id_Coche }}">Borrar</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
@endsection