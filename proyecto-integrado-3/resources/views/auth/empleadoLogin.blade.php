@extends('layouts.masterEmpleado')
@section('title','Login')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Login Empleado</title>
    <link href="{!! asset('css/login.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/login.js') !!}"></script>

</head>

<body>


    <main class="form-signin">
        <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
            <h1 class="text-decoration-underline text-white">Empleado</h1><br>
            <h1 class="h3 mb-3 fw-normal text-white">Iniciar sesión</h1>
            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            <form id="loginEmpleado" method="post" action="/empleado/login">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Correo</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Contraseña</label>
                </div>
                <input type="submit" class="w-100 btn btn-lg btn-primary" value="Iniciar sesión">
                <p class="mt-5 mb-3 ">&copy; 2022</p>
            </form>
        </div>
    </main>
</body>

</html>

</html>
@endsection