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
            <div class="col-6 offset-3">
                <h1 class="text-center m-5">Empleado dashboard</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card d-block mx-auto" style="width: 18rem;">
                    <a href="/empleado/tablaalquiler">
                        <img src="{!! asset('img/papeles.webp') !!}" class="card-img-top " style="width:286px ; height:228px;" alt="...">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 ">
                <div class="card d-block mx-auto" style="width: 18rem;">
                    <a href="/empleado/tablacoche">
                        <img src="{!! asset('img/cochemenu.png') !!}" class="card-img-top d-block mx-auto" style="width:256px ; height:228px;" alt="...">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="card d-block mx-auto" style="width: 18rem;">
                    <a href="/empleado/tablaempleado">
                        <img src="{!! asset('img/empleados.jpg') !!}" class="card-img-top" style="width:286px ; height:228px;" alt="...">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection