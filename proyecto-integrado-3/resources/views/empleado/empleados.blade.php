@extends('layouts.masterEmpleado')
@section('title','Empleados')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <title>Empleados</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-3">
                    <h1 class="text-center m-5">Empleados</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                </div>
                <div class="col-12 col-lg-3 position-relative">
                <a class="btn btn-success position-absolute bottom-0 end-0" href="/empleado/modificarempleado/null">Añadir nuevo empleado</a>
            </div>
            <table class="table" style="margin:auto">
                <tr>
                    <th>Nº Empleado</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Pais</th>
                    <th>Provincia</th>
                    <th>Ciudad</th>
                    <th>Codigo postal</th>
                    <th>Calle</th>
                    <th>Puesto</th>

                    <th>Editar</th>
                    <th>Borrar</th>

                </tr>
                @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id_Empleado }}</td>
                    <td>{{ $empleado->name }}</td>
                    <td>{{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->pais }}</td>
                    <td>{{ $empleado->provincia }}</td>
                    <td>{{ $empleado->ciudad }}</td>
                    <td>{{ $empleado->cp }}</td>
                    <td>{{ $empleado->calle }}</td>
                    <td>{{ $empleado->puesto }}</td>

                    <td><a class="btn btn-primary" href="/empleado/modificarempleado/{{ $empleado->id_Empleado }}">Editar</a></td>
                    <td><a class="btn btn-danger" href="/empleado/eliminarempleado/{{ $empleado->id_Empleado }}">Borrar</a></td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </body>
</html>
@endsection