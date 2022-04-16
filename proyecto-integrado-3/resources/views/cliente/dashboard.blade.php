@extends('layouts.masterCliente')
@section('title','Dashboard')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cliente dashboard</title>
    </style>
</head>

<body>


    <div class="container">
        <div class="row">

            @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif


            <div>
                {{session::get('usuario')[0]->name}}
            </div>
            <!-- <div>
                <?php //echo session::get('usuario')[0]->name; ?>
            </div> -->
        </div>

        <div class="row">
            <form action="">
                
            </form>
        </div>
    </div>
    <!-- -
        @if (session()->get('tipo')=='cliente')
            <h1>esto si</h1>
        @endif -->

</body>

</html>
@endsection