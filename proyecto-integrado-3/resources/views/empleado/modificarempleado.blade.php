@extends('layouts.masterEmpleado')
@section('title','Empleado')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Empleado</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center m-5">Empleado</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        @if($empleado==null)
        <div>
            <form method="post" action="/empleado/modificarempleado" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="bastidor">Bastidor</label>
                <br>
                <input type="text" name="bastidor">
                <br>
                <label for="marca">Marca</label>
                <br>
                <input type="text" name="marca">
                <br>
                <label for="modelo">Modelo</label>
                <br>
                <input type="text" name="modelo">
                <br>
                <label for="color">Color</label>
                <br>
                <input type="text" name="color">
                <br>
                <label for="matricula">Matricula</label>
                <br>
                <input type="text" name="matricula">
                <br>

                <label for="precio">Precio</label>
                <br>
                <input type="number" name="precio">
                <br>
                <input type="submit" class="btn btn-primary mt-2" value="Agregar empleado">
            </form>
        </div>
        @else
        <div>
            <form method="post" action="/empleado/modificarempleado" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_Coche" value="{{ $empleado->id_Coche }}">
                <br>
                <label for="bastidor">Bastidor</label>
                <br>
                <input type="text" name="bastidor" value="{{ $empleado->bastidor }}" disabled>
                <br>
                <label for="marca">Marca</label>
                <br>
                <input type="text" name="marca" value="{{ $empleado->marca }}" disabled>
                <br>
                <label for="modelo">Modelo</label>
                <br>
                <input type="text" name="modelo" value="{{ $empleado->modelo }}" disabled>
                <br>
                <label for="color">Color</label>
                <br>
                <input type="text" name="color" value="{{ $empleado->color }}">
                <br>
                <label for="matricula">Matricula</label>
                <br>
                <input type="text" name="matricula" value="{{ $empleado->matricula }}" disabled>
                <br>
                <label for="precio">Precio</label>
                <br>
                <input type="number" name="precio" value="{{ $empleado->precio }}">
                <br>
                <input type="submit" class="btn btn-primary mt-2" value="Realizar Cambio">
            </form>
        </div>
        @endif

    </div>

</body>

</html>
@endsection