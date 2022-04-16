@extends('layouts.masterCliente')
@section('title','Presupuesto')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cliente Presupuesto</title>
    <link href="{!! asset('css/presupuesto.css') !!}" rel="stylesheet" type="text/css">

</head>

<body>


    <div class="container">
        <div class="row">

            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
            <div class="col-3">
                <h1>{{$datos['coche'][0]->marca}} {{$datos['coche'][0]->modelo}}</h1>
                <img src="{!! asset('img/cocheLogin.jpg') !!}" class="img-fluid" alt="...">
                <h6 class="mt-3">Recogida: {{$datos['sucursal']}} <br>Fecha: {{date('d M Y H:i', strtotime($datos['recogida']))}}</h6>
                <h6 class="mt-3">Devolución: {{$datos['sucursal']}} <br>Fecha: {{date('d M Y H:i', strtotime($datos['devolucion']))}}</h6>
                <h5 class="mt-3">Precio final: {{$datos['precioTotal']}}€</h5>
                <?php var_dump(session('datosPresupuesto'));?>
            </div>

            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <div class="border border-dark rounded-3 m-4">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab quia necessitatibus quae exercitationem, minima ad commodi porro, doloribus consequatur sunt a, dolore corrupti vero aut cumque placeat deserunt magnam facilis?</p>
                        </div>



                    </div>
                    @if (session()->get('tipo')=='cliente')
                    <h1>Es cliente, paga</h1>
                    

                    @endif





                    @if (session()->get('tipo')!='cliente' && session()->get('tipo')!='empleado')
                    <h1>sin login no puede pagar</h1>
                    <div class="col-4">
                        <div class="border border-dark rounded-3 m-4">
                            <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
                                <h5 class="h5 mb-3 fw-normal text-white">¿Tienes ya una cuenta?</h5>
                                <h5 class="h5 mb-3 fw-normal text-white">Iniciar sesión</h5>

                                @if(\Session::has('error'))
                                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <form method="post" action="/cliente/login">
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

                    <div class="col-8">
                        <div class="border border-dark rounded-3 m-4">
                            <div class="text-center container bg-secondary p-2 text-dark bg-opacity-50">
                                <h5 class="h5 mb-3 fw-normal text-white">¿Todavía sin una cuenta?</h5>
                                <h5 class="h5 mb-3 fw-normal text-white">Registrate ya</h5>

                                @if(\Session::has('error'))
                                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <form method="post" action="/cliente/register">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-floating row g-2">
                                        <div class="form-floating mt-2 col-4 ">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                                            <label for="name" class="me-3">Nombre</label>
                                        </div>
                                        <div class="form-floating mt-2 col-8">
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
                                        <div class="form-floating col-6 mt-3">
                                            <input type="text" class="form-control" id="dni" name="dni" placeholder="dni">
                                            <label for="dni">DNI</label>
                                        </div>
                                        <div class="form-floating col-6 mt-3">
                                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                                            <label for="telefono">Telefono</label>
                                        </div>

                                        <div class="form-floating col-4 mt-2">
                                            <input type="text" class="form-control" id="pais" name="pais" placeholder="pais">
                                            <label for="pais">Pais</label>
                                        </div>
                                        <div class="form-floating col-8 mt-2 ">
                                            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="provincia">
                                            <label for="provincia">Provincia</label>
                                        </div>
                                        <div class="form-floating col-7 mt-2">
                                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad">
                                            <label for="ciudad">Ciudad</label>
                                        </div>
                                        <div class="form-floating col-5 mt-2">
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

            <?php
            // var_dump($datos);
            // echo $datos['dias'];
            // echo '<br>';
            // echo $datos['coche'][0]->precio ;
            // echo '<br>';
            // echo $datos['recogida'];
            // echo '<br>';
            // echo $datos['devolucion'];
            // echo '<br>';
            // echo $datos['precioTotal'];
            ?>
        </div>

        <!-- -
        @if (session()->get('tipo')=='cliente')
            <h1>esto si</h1>
        @endif -->

</body>

</html>
@endsection