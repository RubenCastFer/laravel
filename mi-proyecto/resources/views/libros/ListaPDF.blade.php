<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2 style="margin:auto" >Listado de libros</h2>
    <table class="table" style="margin:auto">
        <tr>
            <th>ISBN</th>
            <th>Titulo</th>
        </tr>

        @foreach ($libros as $libro) 
        <tr>
            <td>{{ $libro->isbn }}</td>
            <td>{{ $libro->titulo }}</td>
        </tr>
        
        @endforeach
    </table>
    </div>
</body>
</html>