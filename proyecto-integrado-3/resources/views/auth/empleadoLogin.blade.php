@extends('layouts.masterEmpleado')
@section('title','Login')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Login Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{!! asset('css/login.css') !!}" rel="stylesheet" type="text/css" >
        <!-- {{ asset('css/app.css') }} -->
</head>

<body>

    
        <main class="form-signin">
        <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
            <h1 class="text-decoration-underline text-white">Empleado</h1><br>
            <h1 class="h3 mb-3 fw-normal text-white">Iniciar sesión</h1>
            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            <form method="post" action="/empleado/login">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">email</label>
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
        <!-- <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Login Empleado</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <form method="post" action="/empleado/login">
                        @csrf
                        <div class="row mt-3">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Input email address">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Input password">
                                    <label for="password">Password</label>
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </body>
</html>
</html>
@endsection