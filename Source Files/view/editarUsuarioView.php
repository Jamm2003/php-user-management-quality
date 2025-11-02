<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
        }

        h3 {
            background-color: #337ab7;
            color: #fff;
            padding: 10px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>
    <h3>Editar Usuario</h3>
    <form action="<?php echo $helper->url("usuarios", "actualizar"); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $usuario->getNombre(); ?>"><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo $usuario->getApellido(); ?>"><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $usuario->getEmail(); ?>"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="<?php echo $usuario->getPassword(); ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
