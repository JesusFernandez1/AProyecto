<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>


<?php $__env->startSection('mostrarUpdateUsuario'); ?>
  <form action="" class="row g-3" method="POST">
  <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="<?php echo e($usuario['nombre']); ?>"><?php echo $error->ErrorFormateado("nombre"); ?>

    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="<?php echo e($usuario['apellido']); ?>"><?php echo $error->ErrorFormateado("apellido"); ?>

    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Contraseña</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="contraseña" value="<?php echo e($usuario['contraseña']); ?>"><?php echo $error->ErrorFormateado("contraseña"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="<?php echo e($usuario['correo']); ?>"><?php echo $error->ErrorFormateado("correo"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Tipo</label>
      <select id="inputState" class="form-select" name="tipo">
        <option selected><?php echo e($usuario['tipo']); ?></option>
        <option>Admin</option>
        <option>Operario</option>
      </select>
      <?php echo $error->ErrorFormateado("tipo"); ?>

    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </form>
  <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base_usuarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\2DAW\CursoPHP\AProyecto\app\views/usuarios_modificar.blade.php ENDPATH**/ ?>