@extends('layouts.masterEmpleado')
@section('title','Alquileres')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Alquileres</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-3">
                <h1 class="text-center m-5">Alquileres</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        <table class="table" style="margin:auto">
            <tr>
                <th>Nº Alquiler</th>
                <th>Nombre</th>
                <th>Coche</th>
                <th>Precio Total</th>
                <th>Fecha de Contrato</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Observación</th>
                <th>Estado</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>

            @foreach ($alquileres as $alquiler)
            <tr>
                <td>{{ $alquiler->id_Alquiler }}</td>
                <td>{{ $alquiler->name }} {{ $alquiler->apellidos }}</td>
                <td>{{ $alquiler->marca }} {{ $alquiler->modelo }}</td>
                <td>{{ $alquiler->precio_total }}</td>
                <td>{{ $alquiler->fecha_contrato }}</td>
                <td>{{ $alquiler->fecha_inicio }}</td>
                <td>{{ $alquiler->fecha_fin }}</td>
                <td>{{ $alquiler->observacion }}</td>
                <td>{{ $alquiler->estado }}</td>
                @if($alquiler->estado!="Finalizado")
                <td><a class="btn btn-success" href="/empleado/modificaralquiler/{{ $alquiler->id_Alquiler }}">Editar</a></td>
                <td><a class="btn btn-danger" href="/empleado/eliminaralquiler/{{ $alquiler->id_Alquiler }}">Eliminar</a></td>
                @endif
            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>
@endsection