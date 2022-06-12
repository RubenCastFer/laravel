@extends('layouts.masterCliente')
@section('title','Principal')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{!! asset('css/principal.css') !!}" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
  <script type="text/javascript" src="{!! asset('js/principal.js') !!}"></script>
  <title>Principal</title>
</head>

<body>

  <div class="container">
    <div class="mt-3 mb-4">
      <h1 class="mt-3 mb-3">Encuentra justo lo que estás buscando</h1>
      <form id="fechas" action="/cliente/coche" method="post">
        @csrf
        <!-- @method('PUT') -->
        <div class="row">
          <div class="col-12 col-lg-4 form-floating">

            <select class="form-select text-center" id="sucursal" name="sucursal" aria-label="Floating label select example">
              <option value="Aeropuerto de Sevilla" selected>Aeropuerto de Sevilla</option>
            </select>
            <label for="sucursal">Oficina de recogida</label>
          </div>
          <div class="col-12 col-lg-3 form-floating">
            <input type="datetime-local" class="form-control text-center" id="recogida" name="recogida" value="" min="" required>
            <label for="recogida">Recogida</label>
          </div>
          <div class="col-12 col-lg-3 form-floating">
            <input type="datetime-local" class="form-control text-center" id="devolucion" name="devolucion" value="" min="" required>
            <label for="devolucion">Devolución</label>
          </div>
          <div class="col-12 col-lg-2 form-floating d-flex align-items-center ">
            <input type="submit" class="btn btn-lg btn-primary" value="buscar">
          </div>
        </div>
      </form>
    </div>


    <div id="carouselExampleCaptions" class="carousel slide col-12 col-lg-6 d-block mx-auto" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
          <img src="/storage/{{ $coches[0]->imagen }}" class="d-block img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$coches[0]->marca}} {{$coches[0]->modelo}}</h5>
            <p>Desde {{$coches[0]->precio}}€ por día</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="/storage/{{ $coches[5]->imagen }}" class="d-block img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$coches[5]->marca}} {{$coches[5]->modelo}}</h5>
            <p>Desde {{$coches[5]->precio}}€ por día</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="/storage/{{ $coches[2]->imagen }}" class="d-block img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$coches[2]->marca}} {{$coches[2]->modelo}}</h5>
            <p>Desde {{$coches[2]->precio}}€ por día</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="/storage/{{ $coches[3]->imagen }}" class="d-block img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$coches[3]->marca}} {{$coches[3]->modelo}}</h5>
            <p>Desde {{$coches[3]->precio}}€ por día</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="/storage/{{ $coches[4]->imagen }}" class="d-block img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$coches[4]->marca}} {{$coches[4]->modelo}}</h5>
            <p>Desde {{$coches[4]->precio}}€ por día</p>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>

  </div>



  <!-- @for ($i = 0; $i < 5; $i++) 
      <div class="carousel-item active" data-bs-interval="5000">
        <img src="/storage/{{ $coches[$i]->imagen }}" class="d-block w-100" alt="..." height="500px">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{$coches[$i]->marca}} {{$coches[$i]->modelo}}</h5>
          <p>Texto</p>
        </div>
      </div>
      @endfor -->
</body>

</html>

@endsection