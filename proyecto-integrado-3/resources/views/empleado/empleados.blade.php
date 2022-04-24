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
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Empleados</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif

                    <p>Tabla con todos los empleados + gestion de empleados</p>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection