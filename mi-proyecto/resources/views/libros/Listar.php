<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Listado de libros</h2>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Titulo</th>
            <th>Autora</th>
            <th>Idioma</th>
            <th>Publicacion</th>
            <th>Editorial</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

    <?php
        foreach ($libros as $libro) {
            echo"<tr>";
            echo "<td>$libro->isbn</td>";
            echo "<td>$libro->titulo</td>";
            echo "<td>$libro->autor</td>";
            echo "<td>$libro->idioma</td>";
            echo "<td>$libro->publicacion</td>";
            echo "<td>$libro->editorial</td>";
            echo '<td><a href="/libros/ver/{{$libros->isbn}}">Ver</a></td>';
            echo '<td><a href="/libros/editar/{{$libros->isbn}}">Editar</a></td>';
            echo '<td><a href="/libros/eliminar/{{$libros->isbn}}">Eliminar</a></td>';
            echo"</tr>";
        }
    ?>
    </table>

</body>
</html>