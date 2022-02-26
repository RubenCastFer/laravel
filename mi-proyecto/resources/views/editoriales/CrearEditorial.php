<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/editoriales/CrearEditorial" method="POST">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <input type="hidden" name="_token" value="csrf_token()">
        <label>ID:</label>
        <input type="number" name="id" placeholder="ID"><br>
        <label>Nombre:</label>
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <label>Nacionalidad:</label>
        <input type="text" name="nacionalidad" placeholder="Nacionalidad"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
