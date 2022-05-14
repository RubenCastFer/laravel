@extends('layouts.masterEmpleado')
@section('title','Coche')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Coche</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center m-5">Coche</h1>
                @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif
            </div>
        </div>
        @if($coche==null)
        <div>
            <form method="post" action="/empleado/modificarcoche" enctype="multipart/form-data">
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
                <label for="archivo">Archivo:</label>
                <br>
                <input type="file" name="archivo">
                <br>
                <label for="estado">Estado:</label>
                <br>
                <select name="estado">
                    <option value="A punto" selected>A punto</option>
                    <option value="Averiado">Averiado</option>
                    <option value="En reparación">En reparación</option>
                </select>
                <br>


                <input type="submit" class="btn btn-primary mt-2" value="Realizar Cambio">
            </form>
        </div>
        @else
        <div>
            <form method="post" action="/empleado/modificarcoche" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_Coche" value="{{ $coche->id_Coche }}">
                <br>
                <label for="bastidor">Bastidor</label>
                <br>
                <input type="text" name="bastidor" value="{{ $coche->bastidor }}" disabled>
                <br>
                <label for="marca">Marca</label>
                <br>
                <input type="text" name="marca" value="{{ $coche->marca }}" disabled>
                <br>
                <label for="modelo">Modelo</label>
                <br>
                <input type="text" name="modelo" value="{{ $coche->modelo }}" disabled>
                <br>
                <label for="color">Color</label>
                <br>
                <input type="text" name="color" value="{{ $coche->color }}">
                <br>
                <label for="matricula">Matricula</label>
                <br>
                <input type="text" name="matricula" value="{{ $coche->matricula }}" disabled>
                <br>
                <label for="precio">Precio</label>
                <br>
                <input type="number" name="precio" value="{{ $coche->precio }}">
                <br>
                <label for="archivo">Archivo:</label>
                <br>
                <input type="file" name="archivo">
                <br>
                <label for="estado">Estado:</label>
                <br>
                <select name="estado">
                    <option value="A punto" selected>A punto</option>
                    <option value="Averiado">Averiado</option>
                    <option value="En reparación">En reparación</option>
                </select>
                <br>


                <input type="submit" class="btn btn-primary mt-2" value="Realizar Cambio">
            </form>
        </div>
        @endif

    </div>

</body>

</html>
@endsection