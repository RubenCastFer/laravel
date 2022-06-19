@extends('layouts.masterCliente')
@section('title','Presupuesto')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cliente Presupuesto</title>
    <link href="{!! asset('css/presupuesto.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/tarjeta.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/login.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/register.js') !!}"></script>

</head>
<body>
    <div class="container">
        <div class="row">

            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            <div class="col-12 col-lg-3">
                <h1>{{$datos['coche'][0]->marca}} {{$datos['coche'][0]->modelo}}</h1>
                <img src="/storage/{{$datos['coche'][0]->imagen}}" class="img-fluid" alt="image">
                <h6 class="mt-3 ms-3">Recogida: {{$datos['sucursal']}} <br>Fecha: {{date('d M Y H:i', strtotime($datos['recogida']))}}</h6>
                <h6 class="mt-3 ms-3">Devolución: {{$datos['sucursal']}} <br>Fecha: {{date('d M Y H:i', strtotime($datos['devolucion']))}}</h6>
                <h6 class="mt-3 ms-3">Tarifa: {{$datos['coche'][0]->precio}}</h6>
                <h6 class="mt-3 ms-3">Fecha del contrato: {{date('d M Y', strtotime($datos['contrato']))}}</h6>
                <h6 class="mt-3 ms-3">Fianza: 500€</h6>
                <h5 class="mt-3 ms-3">Precio final: {{$datos['precioTotal']}}€</h5>
            </div>
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="border border-dark rounded-3 m-4">
                            <p class="ms-3 mt-3">
                                Recibe lleno el depósito y entrégalo lleno a la devolución. 
                                <br>
                                Seguro de ocupantes del vehículo.
                                <br>
                                Cobertura básica de daños con franquicia (CDW).
                                <br>
                                IVA incluido
                            </p>
                        </div>
                    </div>

                    @if (session()->get('tipo')=='empleado')
                    <h1 class="text-center m-5">Cierre sesión como empleado</h1>
                    @endif
                    <!--esta registrado -->
                    @if (session()->get('tipo')=='cliente')
                    <div class="col-12 col-lg-12 ">
                        <div class="border border-dark rounded-3 m-4">
                            <h1 class="ms-3 mt-3">Importe: {{$datos['precioTotal']}}€</h1>
                            <form id="paga" method="post" action="/cliente/pago">
                                @csrf
                                <div class="row form-floating g-2 ms-3">
                                    <h5 class="ps-4">Datos de la tarjeta</h5>
                                    <div class="col-12 col-lg-7 p-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="titular" name="titular" placeholder="titular" required>
                                            <label for="titular">Titular</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" class="form-control" id="nTarjeta" name="nTarjeta" placeholder="nTarjeta" require>
                                            <label for="nTarjeta">Nº Tarjeta</label>
                                        </div>

                                        <div class="form-floating col-12 col-lg-4 mt-2">
                                            <input type="text" class="form-control" id="seguridad" name="seguridad" placeholder="seguridad" required>
                                            <label for="seguridad">CVV</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 p-4">
                                        <div class="row g-2">
                                            <h6>Caducidad:</h6>
                                            <div class="form-floating mt-2 col-12 col-lg-6">
                                                <input type="text" class="form-control" id="dd" name="dd" placeholder="dd" require>
                                                <label for="dd">dd</label>
                                            </div>
                                            <div class="form-floating mt-2 col-12 col-lg-6">
                                                <input type="text" class="form-control" id="MM" name="MM" placeholder="MM" require>
                                                <label for="MM">MM</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="w-100 btn btn-lg btn-primary mt-2" value="Realizar Pago">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    @endif

                    <!--No esta registrado tendra que iniciar sesion u registrarse -->
                    @if (session()->get('tipo')!='cliente' && session()->get('tipo')!='empleado')
                    
                    <!--Login -->
                    <div class="col-12 col-lg-4">
                        <div class="border border-dark rounded-3 m-4">
                            <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
                                <h5 class="h5 mb-3 fw-normal text-white">¿Tienes ya una cuenta?</h5>
                                <h5 class="h5 mb-3 fw-normal text-white">Iniciar sesión</h5>
                                <!-- @if(\Session::has('error'))
                                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif -->
                                <form id="loginCliente" method="post" action="/cliente/login">
                                    @csrf
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                        <label for="email">Correo</label>
                                    </div>
                                    <div class="form-floating mt-2">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <label for="password">Contraseña</label>
                                    </div>
                                    <input type="submit" class="w-100 btn btn-lg btn-primary mt-2" value="Iniciar sesión">
                                </form>
                            </div>
                            </main>
                        </div>
                    </div>

                    <!--registro -->
                    <div class="col-12 col-lg-8">
                        <div class="border border-dark rounded-3 m-4">
                            <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
                                <h5 class="h5 mb-3 fw-normal text-white">¿Todavía sin una cuenta?</h5>
                                <h5 class="h5 mb-3 fw-normal text-white">Registrate ya</h5>
                                <!-- @if(\Session::has('error'))
                                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif -->
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
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection