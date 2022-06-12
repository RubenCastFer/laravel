@extends('layouts.masterEmpleado')
@section('title','Dashboard')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Empleado dashboard</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-3">
                <!-- <h1 class="text-center m-5">Empleado dashboard</h1> -->
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        <div class="row text-center mt-5">
            <div class="col-12 col-lg-4 mt-5">
                <div class="card d-block mx-auto" style="width: 18rem;">
                    <a class="text-decoration-none text-black" href="/empleado/tablaalquiler">
                        <img src="{!! asset('img/papeles.webp') !!}" class="card-img-top " style="width:286px ; height:228px;" alt="...">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Reservas</h5>
                            <p class="card-text"></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-5">
                <div class="card d-block mx-auto" style="width: 18rem;">
                    <a class="text-decoration-none text-black" href="/empleado/tablacoche">
                        <img src="{!! asset('img/cochemenu.png') !!}" class="card-img-top d-block mx-auto" style="width:256px ; height:228px;" alt="...">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Coches</h5>
                            <p class="card-text"></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-5">
                <div class="card d-block mx-auto" style="width: 18rem;">
                    <a class="text-decoration-none text-black" href="/empleado/tablaempleado">
                        <img src="{!! asset('img/empleados.jpg') !!}" class="card-img-top" style="width:286px ; height:228px;" alt="...">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Empleados</h5>
                            <p class="card-text"></p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection