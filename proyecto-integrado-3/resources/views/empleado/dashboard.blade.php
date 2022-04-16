@extends('layouts.masterEmpleado')
@section('title','Dashboard')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <title>Empleado dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Empleado dashboard</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
@endsection