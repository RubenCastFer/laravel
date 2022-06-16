@extends('layouts.masterEmpleado')
@section('title','Alquiler')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Alquiler</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-3">
                <h1 class="text-center m-5">Alquiler</h1>
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
                <th>Observacion</th>
                <th>Estado</th>
            </tr>
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
            </tr>
        </table>
        <div>
            <form id="modificarAlquiler" method="post" action="/empleado/modificaralquiler/{{ $alquiler->id_Alquiler }}">
                @method('PUT')
                @csrf
                <label for="observacion">Observacion:</label>
                <br>
                <textarea id="observacion" name="observacion" rows="4" cols="50" maxlength="250" placeholder="Detalles"></textarea>
                <br>
                <label for="estado">Estado:</label>
                <br>
                <select name="estado" id="estado">
                    <option value="" selected>Seleccione...</option>
                    <option value="Preparación">Preparación</option>
                    <option value="En curso">En curso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
                <br>
                <input type="submit" class="btn btn-primary mt-2" value="Realizar Cambio">
            </form>
        </div>
    </div>

</body>

</html>
@endsection