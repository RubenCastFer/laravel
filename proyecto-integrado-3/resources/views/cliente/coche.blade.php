@extends('layouts.masterCliente')
@section('title','Dashboard')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cliente dashboard</title>
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            @foreach ($cochesLibres as $coche)
            <div class="row mt-3">
                <div class="col-12 col-lg-6">
                    <!-- <img src="{!! asset('storage{{ $coche->imagen }}') !!}" class="img-fluid" alt="..."> -->
                    <img src="/storage/{{ $coche->imagen }}" class="img-fluid" alt="image">
                    
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center">
                    <div class="card " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$coche->marca}} {{$coche->modelo}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Color: {{$coche->color}}</h6>
                            <p class="card-text"></p>
                            <h1>
                                {{$coche->precio}}€/DIA
                            </h1>
                            <form action="/cliente/presupuesto" method="POST">
                                <input type="hidden" name="id_Coche" value="{{$coche->id_Coche}}">
                                <input type="submit" class="btn btn-lg btn-success" value="Seleccionar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</body>
</html>
@endsection