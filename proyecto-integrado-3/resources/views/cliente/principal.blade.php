@extends('layouts.masterCliente')
@section('title','Principal')
@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Principal</title>
</head>

<body>
  <h2 style="margin:auto">hola</h2>

  <div class="container">
    <form action="/cliente/coche" method="post">
      @csrf
      <!-- @method('PUT') -->
      <div class="row">
        <div class="col-4 form-floating">

          <select class="form-select text-center" id="sucursal" name="sucursal" aria-label="Floating label select example">
            <option value="Aeropuerto de Sevilla" selected>Aeropuerto de Sevilla</option>
          </select>
          <label for="sucursal">Oficina de recogida</label>
        </div>
        <div class="col-3 form-floating">
          <input type="datetime-local" class="form-control text-center" id="recogida" name="recogida" value="" min="">
          <label for="recogida">Recogida</label>
        </div>
        <div class="col-3 form-floating">
          <input type="datetime-local" class="form-control text-center" id="devolucion" name="devolucion" value="" min="">
          <label for="devolucion">Devolución</label>
        </div>
        <div class="col-2 form-floating d-flex align-items-center ">
          <input type="submit" class="btn btn-lg btn-primary" value="buscar">
        </div>
      </div>
    </form>

  </div>


  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <img src="image/aventura.jpg" class="d-block w-100" alt="..." height="500px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Aventuras</h5>
          <p>Una gran colección de emocionates libros sobre aventuras</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="image/cienciaFiccion.jpg" class="d-block w-100" alt="..." height="500px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ciencia Ficción</h5>
          <p>Una gran colección de libros de ciencia ficción</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="image/fantasia.jpg" class="d-block w-100" alt="..." height="500px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Fantasía</h5>
          <p>Una gran colección de emocionates aventuras de fantasía</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="image/horror.jpg" class="d-block w-100" alt="..." height="500px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Horror</h5>
          <p>Una gran colección de libros de terror</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="image/romantica.jpg" class="d-block w-100" alt="..." height="500px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Romanticas</h5>
          <p>Una gran colección de libros romanticos</p>
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

</body>

</html>

@endsection