@extends('layouts.masterCliente')
@section('title','Alquileres')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cliente Alquileres</title>
    <link href="{!! asset('css/principal.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/principal.js') !!}"></script>

</head>

<body>
    <div class="container">
        @if(\Session::has('error'))
        <div class="alert alert-danger">
            {{ \Session::get('error') }}
        </div>
        @endif

        <h1 class="text-center mt-3">Bienvenido {{session('usuario')[0]->name}}</h1>

        <h3 class="mt-3 mb-3">Encuentra justo lo que estás buscando</h3>
        <div class="mt-3 mb-3">
            <form id="fechas" action="/cliente/coche" method="post">
                @csrf
                <!-- @method('PUT') -->
                <div class="row">
                    <div class="col-12 col-lg-4 form-floating">

                        <select class="form-select text-center" id="sucursal" name="sucursal" aria-label="Floating label select example">
                            <option value="Aeropuerto de Sevilla" selected>Aeropuerto de Sevilla</option>
                        </select>
                        <label for="sucursal">Oficina de recogida</label>
                    </div>
                    <div class="col-12 col-lg-3 form-floating">
                        <input type="datetime-local" class="form-control text-center" id="recogida" name="recogida" value="" min="" required>
                        <label for="recogida">Recogida</label>
                    </div>
                    <div class="col-12 col-lg-3 form-floating">
                        <input type="datetime-local" class="form-control text-center" id="devolucion" name="devolucion" value="" min="" required>
                        <label for="devolucion">Devolución</label>
                    </div>
                    <div class="col-12 col-lg-2 form-floating d-flex align-items-center ">
                        <input type="submit" class="btn btn-lg btn-primary" value="buscar">
                    </div>
                </div>
            </form>
        </div>

        <h2>Tus Contratos</h2>
        @if(!empty($alquileres))
        <div class="row mt-3">
            @foreach ($alquileres as $alquiler)

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
                    <p>Estado: {{$alquiler->estado_alquiler}}</p>
                    @if($alquiler->estado_alquiler=='Preparación')
                    <a href="/cliente/eliminaralquiler/{{$alquiler->id_Alquiler}}" class="btn btn-danger">Cancelar reserva</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div>
            <p>Actualmente no has realizado ningún alquiler.</p>
        </div>
        @endif
    </div>
</body>

</html>
@endsection