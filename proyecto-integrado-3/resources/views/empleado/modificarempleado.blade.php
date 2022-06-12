@extends('layouts.masterEmpleado')
@section('title','Empleado')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Empleado</title>
    <link href="{!! asset('css/modificarEmpleado.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/registerEmple.js') !!}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-3">
                <h1 class="text-center m-5">Empleado</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        @if($empleado==null)
        <div class="col-12 col-lg-7 mx-auto">
            <form id="registroEmple1" method="post" action="/empleado/modificarempleado" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-floating row g-2">
                    <div class="form-floating mt-2 col-12 col-lg-4 ">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                        <label for="name" class="me-3">Nombre</label>
                    </div>
                    <div class="form-floating mt-2 col-12 col-lg-8">
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" required>
                        <label for="apellidos">Apellidos</label>
                    </div>
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Correo</label>
                </div>
                <div class="form-floating row g-2">
                    <div class="form-floating col-12 col-lg-6 mt-3">
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="dni">
                        <label for="dni">DNI</label>
                    </div>
                    <div class="form-floating col-12 col-lg-6 mt-3">
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                        <label for="telefono">Telefono</label>
                    </div>

                    <div class="form-floating col-12 col-lg-4 mt-2">
                        <input type="text" class="form-control" id="pais" name="pais" placeholder="pais">
                        <label for="pais">Pais</label>
                    </div>
                    <div class="form-floating col-12 col-lg-8 mt-2 ">
                        <input type="text" class="form-control" id="provincia" name="provincia" placeholder="provincia">
                        <label for="provincia">Provincia</label>
                    </div>
                    <div class="form-floating col-12 col-lg-7 mt-2">
                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad">
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <div class="form-floating col-12 col-lg-5 mt-2">
                        <input type="number" class="form-control" id="cp" name="cp" placeholder="cp">
                        <label for="cp">Código Postal</label>
                    </div>
                    <div class="form-floating col-12 col-lg-6 mt-2">
                        <input type="text" class="form-control" id="calle" name="calle" placeholder="calle">
                        <label for="calle">Dirección</label>
                    </div>
                    <div class="form-floating col-12 col-lg-6 mt-2">
                        <input type="text" class="form-control" id="puesto" name="puesto" placeholder="puesto">
                        <label for="puesto">Puesto</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-2" value="Agregar empleado">
            </form>
        </div>
        @else
        <div class="col-12 col-lg-7 mx-auto">
            <form id="registroEmple2" method="post" action="/empleado/modificarempleado" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_Empleado" value="{{ $empleado->id_Empleado }}">
                <div class="form-floating row g-2">
                    <div class="form-floating mt-2 col-12 col-lg-4 ">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $empleado->name }}" required>
                        <label for="name" class="me-3">Nombre</label>
                    </div>
                    <div class="form-floating mt-2 col-12 col-lg-8">
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="{{ $empleado->apellidos }}" required>
                        <label for="apellidos">Apellidos</label>
                    </div>
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ $empleado->email }}" required>
                    <label for="email">Correo</label>
                <div class="form-floating row g-2">
                    <div class="form-floating col-12 col-lg-6 mt-3">
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="{{ $empleado->dni }}">
                        <label for="dni">DNI</label>
                    </div>
                    <div class="form-floating col-12 col-lg-6 mt-3">
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="{{ $empleado->telefono }}">
                        <label for="telefono">Telefono</label>
                    </div>

                    <div class="form-floating col-12 col-lg-4 mt-2">
                        <input type="text" class="form-control" id="pais" name="pais" placeholder="pais" value="{{ $empleado->pais }}">
                        <label for="pais">Pais</label>
                    </div>
                    <div class="form-floating col-12 col-lg-8 mt-2 ">
                        <input type="text" class="form-control" id="provincia" name="provincia" placeholder="provincia" value="{{ $empleado->provincia }}">
                        <label for="provincia">Provincia</label>
                    </div>
                    <div class="form-floating col-12 col-lg-7 mt-2">
                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" value="{{ $empleado->ciudad }}">
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <div class="form-floating col-12 col-lg-5 mt-2">
                        <input type="number" class="form-control" id="cp" name="cp" placeholder="cp" value="{{ $empleado->cp }}">
                        <label for="cp">Código Postal</label>
                    </div>
                    <div class="form-floating col-12 col-lg-6 mt-2">
                        <input type="text" class="form-control" id="calle" name="calle" placeholder="calle" value="{{ $empleado->calle }}">
                        <label for="calle">Dirección</label>
                    </div>
                    <div class="form-floating col-12 col-lg-6 mt-2">
                        <input type="text" class="form-control" id="puesto" name="puesto" placeholder="puesto" value="{{ $empleado->puesto }}">
                        <label for="puesto">Puesto</label>
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