<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Ejemplo PHP MySQLi POO MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        body{
            background-color:black;
            color: white;
            font-size: 15px;
            background-image: url('');  
            background-size:cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
        }
        input {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .right {
            float: right;
        }
    </style>
</head>
<body>
<form action="<?php echo $helper->url("usuarios", "crear"); ?>" method="post" class="col-lg-5">
    <h3>Añadir usuario</h3>
    <hr />
    Nombre: <input type="text" name="nombre" class="form-control" />
    Apellido: <input type="text" name="apellido" class="form-control" />
    Email: <input type="text" name="email" class="form-control" />
    Contraseña: <input type="password" name="password" class="form-control" />
    <input type="submit" value="Enviar" class="btn btn-success" />
</form>


<div class="col-lg-7">
    <h3>Usuarios</h3>
    <hr />
</div>
<section class="col-lg-7 usuario" style="height: 400px; overflow-y: scroll;">
<?php if (!empty($allusers)): ?>
    <?php foreach ($allusers as $user): ?>
        <?php echo $user->id; ?> -
        <?php echo $user->nombre; ?> -
        <?php echo $user->apellido; ?> -
        <?php echo $user->email; ?>
        <div class="right">
            <a href="<?php echo $helper->url("usuarios", "borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
            <a href="<?php echo $helper->url("usuarios", "modificar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Modificar</a>
        </div>
        <hr/>
    <?php endforeach; ?>
<?php endif; ?>
</section>

<form action="<?php echo $helper->url("productos", "crear"); ?>" method="post" class="col-lg-5">
    <h3>Añadir producto</h3>
    <hr />
    Nombre: <input type="text" name="nombre" class="form-control" />
    Precio: <input type="number" name="precio" class="form-control" />
    Marca: <input type="text" name="marca" class="form-control" />
    <input type="submit" value="Enviar" class="btn btn-success" />
</form>

<hr />

<?php if (!empty($allproducts)): ?>
    <div class="col-lg-7">
        <h3>Productos</h3>
        <hr />
    </div>
    <section class="col-lg-7 producto" style="height: 400px; overflow-y: scroll;">
        <?php foreach ($allproducts as $product): ?>
            <?php echo $product->id; ?> -
            <?php echo $product->nombre; ?> -
            <?php echo $product->precio; ?> -
            <?php echo $product->marca; ?>
            <div class="right">
                <a href="<?php echo $helper->url("productos", "borrar"); ?>&id=<?php echo $product->id; ?>" class="btn btn-danger">Borrar</a>
                <a href="<?php echo $helper->url("productos", "modificar"); ?>&id=<?php echo $product->id; ?>" class="btn btn-danger">Modificar</a>
            </div>
            <hr />
        <?php endforeach; ?>
    </section>
<?php endif; ?>
<form action="<?php echo $helper->url("ventas", "crear"); ?>" method="post" class="col-lg-5">
    <h3>Añadir Venta</h3>
    <hr />
    Producto:
    <select name="producto_id" class="form-control">
        <?php foreach ($allproducts as $product): ?>
            <option value="<?php echo $product->id; ?>"><?php echo $product->nombre; ?></option>
        <?php endforeach; ?>
    </select>
    Fecha: <input type="date" name="fecha" class="form-control" />
    Cantidad: <input type="number" name="cantidad" class="form-control" />
    <input type="submit" value="Enviar" class="btn btn-success" />
</form>

<div class="col-lg-7">
    <h3>Ventas</h3>
    <hr />
</div>
<section class="col-lg-7 venta" style="height: 400px; overflow-y: scroll;">
    <?php if (!empty($allventas)): ?>
        <?php foreach ($allventas as $venta): ?>
            <?php echo $venta->id; ?> -
            <?php echo $venta->producto_nombre; ?> -
            <?php echo $venta->fecha; ?> -
            <?php echo $venta->cantidad; ?>
            <div class="right">
                <a href="<?php echo $helper->url("ventas", "borrar"); ?>&id=<?php echo $venta->id; ?>" class="btn btn-danger">Borrar</a>
            </div>
            <hr />
        <?php endforeach; ?>
    <?php endif; ?>
</section>
<form action="<?php echo $helper->url("compras", "crear"); ?>" method="post" class="col-lg-5">
    <h3>Añadir Compra</h3>
    <hr />
    Producto:
    <select name="producto_id" class="form-control">
        <?php foreach ($allproducts as $product): ?>
            <option value="<?php echo $product->id; ?>"><?php echo $product->nombre; ?></option>
        <?php endforeach; ?>
    </select>
    Fecha: <input type="date" name="fecha_compra" class="form-control" />
    Cantidad: <input type="number" name="cantidad" class="form-control" />
    Gasto: <input type="number" step="0.01" name="gasto" class="form-control" />
    <input type="submit" value="Enviar" class="btn btn-success" />
</form>

<div class="col-lg-7">
    <h3>Compras</h3>
    <hr />
</div>
<section class="col-lg-7 compra" style="height: 400px; overflow-y: scroll;">
    <?php if (!empty($allcompras)): ?>
        <?php foreach ($allcompras as $compra): ?>
            <?php echo $compra->id; ?> -
            <?php echo $compra->producto_id; ?>
            <?php echo $compra->fecha_compra; ?> 
            <?php echo $compra->cantidad; ?> 
            <?php echo $compra->gasto; ?>
            <div class="right">
                <a href="<?php echo $helper->url("compras", "borrar"); ?>&id=<?php echo $compra->id; ?>" class="btn btn-danger">Borrar</a>
            </div>
            <hr />
        <?php endforeach; ?>
    <?php endif; ?>
</section>


</body>
</html>
