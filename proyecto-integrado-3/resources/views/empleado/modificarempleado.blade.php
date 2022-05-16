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
                <label for="name">Nombre</label>
                <br>
                <input type="text" name="name">
                <br>
                <label for="apellidos">Apellidos</label>
                <br>
                <input type="text" name="apellidos">
                <br>
                <label for="email">Correo</label>
                <br>
                <input type="email" name="email">
                <br>
                <label for="dni">DNI</label>
                <br>
                <input type="text" name="dni">
                <br>
                <label for="telefono">Telefono</label>
                <br>
                <input type="number" name="telefono">
                <br>
                <label for="pais">Pais</label>
                <br>
                <input type="text" name="pais">
                <br>
                <label for="provincia">Provincia</label>
                <br>
                <input type="text" name="provincia">
                <br><label for="ciudad">Ciudad</label>
                <br>
                <input type="text" name="ciudad">
                <br>
                <label for="cp">Código Postal</label>
                <br>
                <input type="text" name="cp">
                <br>
                <label for="calle">Calle</label>
                <br>
                <input type="text" name="calle">
                <br>
                <label for="puesto">Puesto</label>
                <br>
                <input type="text" name="puesto">
                <br>
                <input type="submit" class="btn btn-primary mt-2" value="Agregar empleado">
            </form>
        </div>
        @else
        <div>
            <form method="post" action="/empleado/modificarempleado" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_Empleado" value="{{ $empleado->id_Empleado }}">
                <br>
                <label for="name">Nombre</label>
                <br>
                <input type="text" name="name" value="{{ $empleado->name }}">
                <br>
                <label for="apellidos">Apellidos</label>
                <br>
                <input type="text" name="apellidos" value="{{ $empleado->apellidos }}">
                <br>
                <label for="email">Correo</label>
                <br>
                <input type="email" name="email" value="{{ $empleado->email }}">
                <br>
                <label for="dni">DNI</label>
                <br>
                <input type="text" name="dni" value="{{ $empleado->dni }}">
                <br>
                <label for="telefono">Telefono</label>
                <br>
                <input type="number" name="telefono" value="{{ $empleado->telefono }}">
                <br>
                <label for="pais">Pais</label>
                <br>
                <input type="text" name="pais" value="{{ $empleado->pais }}">
                <br>
                <label for="provincia">Provincia</label>
                <br>
                <input type="text" name="provincia" value="{{ $empleado->provincia }}">
                <br><label for="ciudad">Ciudad</label>
                <br>
                <input type="text" name="ciudad" value="{{ $empleado->ciudad }}">
                <br>
                <label for="cp">Código Postal</label>
                <br>
                <input type="text" name="cp" value="{{ $empleado->cp }}">
                <br>
                <label for="calle">Calle</label>
                <br>
                <input type="text" name="calle" value="{{ $empleado->calle }}">
                <br>
                <label for="puesto">Puesto</label>
                <br>
                <input type="text" name="puesto" value="{{ $empleado->puesto }}">
                <br>
                <input type="submit" class="btn btn-primary mt-2" value="Realizar Cambio">
            </form>
        </div>
        @endif

    </div>

</body>

</html>
@endsection