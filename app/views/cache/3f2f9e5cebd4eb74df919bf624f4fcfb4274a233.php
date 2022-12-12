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


<?php $__env->startSection('mostrarUsuarios'); ?>
  <form action="" class="row g-3" method="POST">
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre"><?php echo $error->ErrorFormateado("nombre"); ?>

    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido"><?php echo $error->ErrorFormateado("apellido"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Contraseña</label>
      <input type="text" class="form-control" name="contraseña"><?php echo $error->ErrorFormateado("contraseña"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo"><?php echo $error->ErrorFormateado("correo"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Tipo</label>
      <select id="inputState" class="form-select" name="tipo">
        <option disabled selected></option>
        <option>Admin</option>
        <option>Operario</option>
      </select>
      <?php echo $error->ErrorFormateado("tipo"); ?>

    </div>
      <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
  </form>
  <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base_usuarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\2DAW\CursoPHP\AProyecto\app\views/usuarios_añadir.blade.php ENDPATH**/ ?>