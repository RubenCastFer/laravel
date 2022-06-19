@extends('layouts.masterCliente')
@section('title','Register')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Register Cliente</title>
    <link href="{!! asset('css/register.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/register.js') !!}"></script>
</head>

<body>
    
<div class="container mt-3">

</div>
    <main class="form-signin">
        <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
        <h1 class="fst-italic text-white">Click & Car</h1><br>
            <h1 class="h3 mb-3 fw-normal text-white">Registrate</h1>
            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            <form id="registroCliente" method="post" action="/cliente/register">
                @csrf
                @method('PUT')
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
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Contraseña</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="PasswordConfirm">
                    <label for="passwordConfirm">Confirmar Contraseña</label>
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
                    <div class="form-floating  mt-2">
                        <input type="text" class="form-control" id="calle" name="calle" placeholder="calle">
                        <label for="calle">Dirección</label>
                    </div>
                </div>


                <input type="submit" class="mt-2 w-100 btn btn-lg btn-primary" value="Registrate">
                <p class="mt-5 mb-3">&copy; 2022</p>
            </form>
        </div>
    </main>
</body>

</html>
@endsection