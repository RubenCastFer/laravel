@extends('layouts.masterEmpleado')
@section('title','Coche')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Coche</title>
    <link href="{!! asset('css/modificarCoche.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/modificarCoche.js') !!}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-3">

                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        @if($coche==null)
        <h1 class="text-center m-5">Añadir un nuevo coche</h1>
        <div class="col-12 col-lg-7 mx-auto">
            <form id="modificarCoche1" method="post" action="/empleado/modificarcoche" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-floating row g-2">
                    <div class="form-floating col-12 col-lg-5 mt-2">
                        <input type="text" class="form-control" name="bastidor">
                        <label for="bastidor">Bastidor</label>
                    </div>
                </div>
                <div class="form-floating mt-2">

                    <div class="form-floating row g-2">
                        <div class="form-floating col-12 col-lg-5 mt-3">
                            <input type="text" class="form-control" name="marca">
                            <label for="marca">Marca</label>
                        </div>
                        <div class="form-floating mt-3 col-12 col-lg-4">
                            <input type="text" class="form-control" name="modelo">
                            <label for="modelo">Modelo</label>
                        </div>
                        <div class="form-floating col-12 col-lg-3 mt-3">
                            <input type="text" class="form-control" name="color">
                            <label for="color">Color</label>
                        </div>
                        <div class="form-floating col-12 col-lg-2 mt-2">
                            <input type="text" class="form-control" name="matricula">
                            <label for="matricula">Matricula</label>
                        </div>
                        <div class="form-floating col-12 col-lg-2 mt-2 ">
                            <input type="number" class="form-control" name="precio">
                            <label for="precio">Precio</label>
                        </div>
                        <div class="form-floating col-12 col-lg-8 mt-2">
                            <input type="file" class="form-control" name="archivo">
                            <label for="archivo">Archivo:</label>
                        </div>
                        <div class="form-floating col-12 col-lg-4 mt-2">
                            <select class="form-control" name="estado">
                                <option value="A punto" selected>A punto</option>
                                <option value="Averiado">Averiado</option>
                                <option value="En reparación">En reparación</option>
                            </select>
                            <label for="estado">Estado:</label>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-2" value="Agregar coche">
            </form>
        </div>
        @else
        <div class="col-12 col-lg-7 mx-auto">
            <img src="/storage/{{ $coche->imagen }}" class="img-fluid mt-3 mb-3" alt="image">

            <form id="modificarCoche2" method="post" action="/empleado/modificarcoche" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_Coche" value="{{ $coche->id_Coche }}">
                <div class="form-floating row g-2">
                    <div class="form-floating col-12 col-lg-5 mt-2">
                        <input type="text" class="form-control" name="bastidor" value="{{ $coche->bastidor }}" disabled>
                        <label for="bastidor">Bastidor</label>
                    </div>
                </div>
                <div class="form-floating mt-2">

                    <div class="form-floating row g-2">
                        <div class="form-floating col-12 col-lg-5 mt-3">
                            <input type="text" class="form-control" name="modelo" value="{{ $coche->modelo }}" disabled>
                            <label for="modelo">Modelo</label>
                        </div>
                        <div class="form-floating mt-3 col-12 col-lg-4">
                            <input type="text" class="form-control" name="marca" value="{{ $coche->marca }}" disabled>
                            <label for="marca">Marca</label>
                        </div>
                        <div class="form-floating col-12 col-lg-3 mt-3">
                            <input type="text" class="form-control" name="color" value="{{ $coche->color }}">
                            <label for="color">Color</label>
                        </div>
                        <div class="form-floating col-12 col-lg-2 mt-2">
                            <input type="text" class="form-control" name="matricula" value="{{ $coche->matricula }}" disabled>
                            <label for="matricula">Matricula</label>
                        </div>
                        <div class="form-floating col-12 col-lg-2 mt-2 ">
                            <input type="number" class="form-control" name="precio" value="{{ $coche->precio }}">
                            <label for="precio">Precio</label>
                        </div>
                        <div class="form-floating col-12 col-lg-8 mt-2">
                            <input type="file" class="form-control" name="archivo">
                            <label for="archivo">Archivo:</label>
                        </div>
                        <div class="form-floating col-12 col-lg-4 mt-2">
                            <select class="form-control" name="estado">
                                <option value="A punto" selected>A punto</option>
                                <option value="Averiado">Averiado</option>
                                <option value="En reparación">En reparación</option>
                            </select>
                            <label for="estado">Estado:</label>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-2" value="Realizar Cambio">
            </form>
        </div>
        @endif

    </div>

</body>

</html>
@endsection