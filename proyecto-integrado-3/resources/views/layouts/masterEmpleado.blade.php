<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/empleado/login"><h1 class="fst-italic">Click & Car</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-4 pe-4" id="navbarNavDarkDropdown">
          <ul class="navbar-nav ms-auto pe-4">
            @if (session()->get('tipo')=='empleado')
            <li class="nav-item">
              <a class="nav-link text-white" href="/empleado/tablaalquiler">Reservas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/empleado/tablacoche">Coches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/empleado/tablaempleado">Empleados</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle navbar-brand" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{session('usuario')[0]->name}}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="/empleado/perfil">Perfil</a></li>
                <li><a class="dropdown-item" href="/empleado/logout">Salir</a></li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>





  @yield('content')

  <br>
  <br>
  <br>
  <footer class="container-fluid footer fixed-bottom bg-dark">
    <div>
      <p class="text-white text-center">Rubén Castellano Fernández, 2022</p>
    </div>
  </footer>

</body>

</html>