<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/libros/Editar/<?php echo $libro->isbn?>" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="csrf_token()">
        <label>Isbn:</label>
        <input type="number" name="isbn" placeholder="ISBN" value="<?php echo $libro->isbn?>"><br>
        <label>Titulo:</label>
        <input type="text" name="titulo" placeholder="Titulo" value="<?php echo $libro->titulo?>"><br>
        <label>Autor:</label>
        <input type="text" name="autor" placeholder="Autor" value="<?php echo $libro->autor?>"><br>
        <label>Idioma:</label>
        <input type="text" name="idioma" placeholder="Idioma" value="<?php echo $libro->idioma?>"><br>
        <label>Publicacion:</label>
        <input type="date" name="publicacion" value="<?php echo $libro->publicacion?>"><br>
        <label>Editorial:</label>
        <input type="number" name="editorial" placeholder="Editorial" value="<?php echo $libro->editorial?>"><br>
        <input type="submit" value="Guardar">
    </form>
</body>

</html>