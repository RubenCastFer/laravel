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
        @if(\Session::has('error'))
        <div class="alert alert-danger">
            {{ \Session::get('error') }}
        </div>
        @endif
        
        <h1 class="text-center mt-3">Bienvenido {{session('usuario')[0]->name}}</h1>
        
        
        <h2>Tus Contratos</h2>
        <div class="row mt-3">
            <h3>En curso</h3>
            @foreach ($alquileres as $alquiler)
            @if($alquiler->estado_alquiler=='En curso')
            <div class="card m-2" style="width: 18rem;">
                <!-- <img src="{!! asset('img/cocheLogin.jpg') !!}" class="card-img-top" alt="..."> -->
                <img src="/storage/{{ $alquiler->imagen }}" class="img-fluid" alt="image">
                <div class="card-body">
                    <h5 class="card-title">{{$alquiler->marca}} {{$alquiler->modelo}}</h5>
                    <p class="card-text">
                        Nº Contrato: {{$alquiler->id_Alquiler}}
                        <br>
                        Fecha Contrato: {{date('d M Y', strtotime($alquiler->fecha_contrato))}}
                        <br>
                        Fecha Recogida: {{date('d M Y', strtotime($alquiler->fecha_inicio))}}
                        <br>
                        Fecha Devolución: {{date('d M Y', strtotime($alquiler->fecha_fin))}}
                        <br>
                        Tarifa: {{$alquiler->precio}}€/DIA
                        <br>
                    </p>
                    <h5>Precio Final: {{$alquiler->precio_total}}€</h5>
                    <p class="btn btn-success"> {{$alquiler->estado_alquiler}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        
        
        <div class="row mt-3">
            <h3>En preparación</h3>
            @foreach ($alquileres as $alquiler)
            @if($alquiler->estado_alquiler=='Preparación')
            <div class="card m-2" style="width: 18rem;">
                <!-- <img src="{!! asset('img/cocheLogin.jpg') !!}" class="card-img-top" alt="..."> -->
                <img src="/storage/{{ $alquiler->imagen }}" class="img-fluid" alt="image">
                <div class="card-body">
                    <h5 class="card-title">{{$alquiler->marca}} {{$alquiler->modelo}}</h5>
                    <p class="card-text">
                        Nº Contrato: {{$alquiler->id_Alquiler}}
                        <br>
                        Fecha Contrato: {{date('d M Y', strtotime($alquiler->fecha_contrato))}}
                        <br>
                        Fecha Recogida: {{date('d M Y', strtotime($alquiler->fecha_inicio))}}
                        <br>
                        Fecha Devolución: {{date('d M Y', strtotime($alquiler->fecha_fin))}}
                        <br>
                        Tarifa: {{$alquiler->precio}}€/DIA
                        <br>
                    </p>
                    <h5>Precio Final: {{$alquiler->precio_total}}€</h5>
                    <p class="btn btn-primary"> {{$alquiler->estado_alquiler}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        
        
        <div class="row mt-3">
            <h3>Finalizado</h3>
            @foreach ($alquileres as $alquiler)
            @if($alquiler->estado_alquiler=='Finalizado')
            <div class="card m-2" style="width: 18rem;">
                <!-- <img src="{!! asset('img/cocheLogin.jpg') !!}" class="card-img-top" alt="..."> -->
                <img src="/storage/{{ $alquiler->imagen }}" class="img-fluid" alt="image">
                <div class="card-body">
                    <h5 class="card-title">{{$alquiler->marca}} {{$alquiler->modelo}}</h5>
                    <p class="card-text">
                        Nº Contrato: {{$alquiler->id_Alquiler}}
                        <br>
                        Fecha Contrato: {{date('d M Y', strtotime($alquiler->fecha_contrato))}}
                        <br>
                        Fecha Recogida: {{date('d M Y', strtotime($alquiler->fecha_inicio))}}
                        <br>
                        Fecha Devolución: {{date('d M Y', strtotime($alquiler->fecha_fin))}}
                        <br>
                        Tarifa: {{$alquiler->precio}}€/DIA
                    </p>
                    <h5>Precio Final: {{$alquiler->precio_total}}€</h5>
                    <p class="btn btn-secondary"> {{$alquiler->estado_alquiler}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</body>

</html>
@endsection