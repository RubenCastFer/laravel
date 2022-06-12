@extends('layouts.masterCliente')
@section('title','Perfil')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link href="{!! asset('css/passwordform.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/perfil.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/passwordform.js') !!}"></script>

    </style>
</head>

<body>


    <div class="container mt-3 mb-3">
        <h3>USUARIO</h3>
        <p>Has iniciado sesión como {{session('usuario')[0]->email}}</p>
        <p>Usuario: {{session('usuario')[0]->name}} {{session('usuario')[0]->apellidos}}</p>
        <p>Teléfono: {{session('usuario')[0]->telefono}}</p>
        <input type="button" id="btusuario" class="btn btn-primary" value="Modificar">
        <div id="usuario" style="display: none;">
            <form id="formusuario" method="post" action="/cliente/cambio">
                @csrf
                @method('PUT')

                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{session('usuario')[0]->name}}" required>
                    <label for="name" class="me-3">Nombre</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="{{session('usuario')[0]->apellidos}}" required>
                    <label for="apellidos">Apellidos</label>
                </div>

                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{session('usuario')[0]->email}}" required>
                    <label for="email">Correo</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="dni" name="dni" value="{{session('usuario')[0]->dni}}" placeholder="dni">
                    <label for="dni">DNI</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="number" class="form-control" id="telefono" name="telefono" value="{{session('usuario')[0]->telefono}}" placeholder="telefono">
                    <label for="telefono">Telefono</label>
                </div>
                <input type="submit" class="mt-2 btn btn-primary" value="Aplicar">

            </form>
        </div>
        <br>
        <hr>
        <H3>DIRECCIÓN</H3>
        <p>Pais: {{session('usuario')[0]->pais}}</p>
        <p>Provincia: {{session('usuario')[0]->provincia}}</p>
        <p>Ciudad: {{session('usuario')[0]->ciudad}}</p>
        <p>Código Postal: {{session('usuario')[0]->cp}}</p>
        <p>Ubicación: {{session('usuario')[0]->calle}}</p>
        <input type="button" id="btdireccion" class="btn btn-primary" value="Modificar">
        <div id="direccion" style="display: none;">
            <form id="formdireccion" method="post" action="/cliente/cambio">
                @csrf
                @method('PUT')

                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="pais" name="pais" value="{{session('usuario')[0]->pais}}" placeholder="pais">
                    <label for="pais">Pais</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="provincia" name="provincia" value="{{session('usuario')[0]->provincia}}" placeholder="provincia">
                    <label for="provincia">Provincia</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{session('usuario')[0]->ciudad}}" placeholder="ciudad">
                    <label for="ciudad">Ciudad</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="number" class="form-control" id="cp" name="cp" value="{{session('usuario')[0]->cp}}" placeholder="cp">
                    <label for="cp">Código Postal</label>
                </div>
                <div class="form-floating col-12 col-lg-4 mt-2">
                    <input type="text" class="form-control" id="calle" name="calle" value="{{session('usuario')[0]->calle}}" placeholder="calle">
                    <label for="calle">Dirección</label>
                </div>
                <input type="submit" class="mt-2 btn btn-primary" value="Aplicar">

            </form>
        </div>
        <br>
        <hr>
        <h3>Seguridad</h3>
        @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        @endif
        <form id="passwordform" method="post" action="/cliente/cambiopassword" class="col-12 col-lg-4">
            @method('PUT')
            @csrf
            <div class="form-floating">
                <input type="password" class="form-control mt-2" id="passwordactual" name="passwordactual" placeholder="Password ">
                <label for="passwordactual">Contraseña Actual</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Password">
                <label for="password">Contraseña Nueva</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control mt-2" id="passwordconfirm" name="passwordconfirm" placeholder="Password Confirm">
                <label for="passwordconfirm">Confirmar Contraseña</label>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="Modificar contraseña">
        </form>
    </div>
</body>

</html>
@endsection