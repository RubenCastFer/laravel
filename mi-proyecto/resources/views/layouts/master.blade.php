<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="/dashboard"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" style width="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="/libros">Libros</a>
          </li>
          
          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="/libros/CrearLibro">Nuevo Libro</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white" href="/editoriales/CrearEditorial">Nueva Editorial</a>
          </li>
          @endauth

          <li class="nav-item">
            <a class="nav-link text-white" href="/libros/Peticion">Nueva Peticion</a>
          </li>
          
          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="/libros/Peticiones">Lista de Peticiones</a>
          </li>
          @endauth

          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="/pelis/PeliForm">Nueva Pelicula</a>
          </li>
          @endauth

          <li class="nav-item">
            <a class="nav-link text-white" href="/pelis/Listar">Listado de Peliculas</a>
          </li>

          @guest
          <li class="nav-item">
            <a class="nav-link text-white" href="/login">Login</a>
          </li>
          @endguest

          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="/dashboard">Panel de Control</a>
          </li>
          @endauth

        </ul>
      </div>
    </div>
  </nav>



  @yield('content')


  <footer class="container-fluid position-absolute bottom-0 bg-secondary">
    <div>
      <p class="text-white text-center">Rubén Castellano Fernández, 2022</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>