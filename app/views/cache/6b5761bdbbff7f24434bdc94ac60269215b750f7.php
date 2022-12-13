<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<!-- vista donde ponemos los buscadores para encontrar una tarea con una serie de filtros -->

<body>
    
    <?php $__env->startSection('mostrarExtension'); ?>
    <form action="" method="POST">
        <label for="inputState" class="form-label">Nombre:</label>
        <input type="text" class="form-control form-control-dark" placeholder="Search..." name="nombre">
        <label for="inputState" class="form-label">Estado:</label>
        <input type="text" class="form-control form-control-dark" placeholder="Search..." name="estado">
        <label for="inputState" class="form-label">Operario:</label>
        <input type="text" class="form-control form-control-dark" placeholder="Search..." name="operario">
        <input type="submit" class="btn btn-primary" value="Insert">
    </form>
    <p><?php echo $error->ErrorFormateado("tarea"); ?></p> <!-- si el usuario o pass son incorrectos, sale un mensaje de error -->
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\2DAW\CursoPHP\AProyecto\app\views/buscador.blade.php ENDPATH**/ ?>