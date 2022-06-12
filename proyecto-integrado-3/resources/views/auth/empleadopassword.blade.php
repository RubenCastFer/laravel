@extends('layouts.masterEmpleado')
@section('title','Cambio Contraseña')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Cambio Contraseña</title>
    <link href="{!! asset('css/login.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/passwordform.js') !!}"></script>
    <!-- {{ asset('css/app.css') }} -->
</head>

<body>


    <main class="form-signin">
        <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
            <h1 class="text-decoration-underline text-white">Cambio de contraseña</h1><br>
            <h1 class="h4 mb-3 fw-normal text-white">Por favor, cambié su contraseña por defecto</h1>
            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            <form id="passwordform" method="post" action="/empleado/cambiopassword">
                @method('PUT')

                @csrf
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Contraseña</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" placeholder="Password Confirm">
                    <label for="passwordconfirm">Password Confirm</label>
                </div>
                <input type="submit" class="w-100 btn btn-lg btn-primary" value="Modificar contraseña">
                <p class="mt-5 mb-3 ">&copy; 2022</p>
            </form>
        </div>
    </main>
</body>

</html>

</html>
@endsection