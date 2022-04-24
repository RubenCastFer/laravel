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
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Alquileres</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif

                    <p>Tabla con todos los alquileres</p>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection