@extends('layouts.masterEmpleado')
@section('title','Coche')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Coche</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center m-5">Coche</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        <table class="table" style="margin:auto">
            <tr>
                <th>Nº Coche</th>
                <th>Bastidor</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Matricula</th>
                <th>Imagen</th>
                <th>Estado</th>
            </tr>
            <tr>
                <td>{{ $coche->id_Coche }}</td>
                <td>{{ $coche->bastidor }}</td>
                <td>{{ $coche->marca }}</td>
                <td>{{ $coche->modelo }}</td>
                <td>{{ $coche->color }}</td>
                <td>{{ $coche->matricula }}</td>
                <td>{{ $coche->imagen }}</td>
                <td>{{ $coche->estado }}</td>

            </tr>
        </table>
        <div>
            <form method="post" action="/empleado/modificarcoche/{{ $coche->id_Coche }}">
                @method('PUT')
                @csrf
                <label for="observacion">Observacion:</label>
                <br>
                <textarea id="observacion" name="observacion" rows="4" cols="50" maxlength="250" placeholder="Detalles"></textarea>
                <br>
                <label for="estado">Estado:</label>
                <br>
                <select name="estado" id="estado">
                    <option value="" selected></option>
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