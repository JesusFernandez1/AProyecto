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


<?php $__env->startSection('mostrarExtension'); ?>
  <form action="" class="row g-3" method="POST">
  <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
      <label for="inputEmail4" class="form-label">NIF/CIF</label>
      <input type="text" class="form-control" name="identificacion" value="<?php echo e($tarea['DNI']); ?>"><?php echo $error->ErrorFormateado("identificacion"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="<?php echo e($tarea['nombre']); ?>"><?php echo $error->ErrorFormateado("nombre"); ?>

    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="<?php echo e($tarea['apellido']); ?>"><?php echo $error->ErrorFormateado("apellido"); ?>

    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="<?php echo e($tarea['telefono']); ?>"><?php echo $error->ErrorFormateado("telefono"); ?>

    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="<?php echo e($tarea['descripcion']); ?>"><?php echo $error->ErrorFormateado("descripcion"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="<?php echo e($tarea['correo']); ?>"><?php echo $error->ErrorFormateado("correo"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input type="text" class="form-control" name="direccion" value="<?php echo e($tarea['direccion']); ?>"><?php echo $error->ErrorFormateado("direccion"); ?>

    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input type="text" class="form-control" name="poblacion" value="<?php echo e($tarea['poblacion']); ?>"><?php echo $error->ErrorFormateado("poblacion"); ?>

    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input type="text" class="form-control" name="codigo" value="<?php echo e($tarea['codigo_postal']); ?>"><?php echo $error->ErrorFormateado("codigo"); ?>

    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Provincia</label>
      <select id="inputState" class="form-select" name="provincia">
        <option selected><?php echo e($tarea['provincia']); ?></option>
        <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provincia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option><?php echo e($provincia["nombre"]); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <?php echo $error->ErrorFormateado("provincia"); ?>

    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select id="inputState" class="form-select" name="estado">
        <option selected><?php echo e($tarea['estado_tarea']); ?></option>
        <option>P</option>
        <option>R</option>
        <option>C</option>
        <option>B</option>
      </select>
      <?php echo $error->ErrorFormateado("estado"); ?>

    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input readonly type="date" class="form-control" id="inputZip" name="inicio" value="<?php echo e($tarea['fecha_creacion']); ?>"><?php echo $error->ErrorFormateado("inicio"); ?>

    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Operarios</label>
      <select id="inputState" class="form-select" name="operario">
        <option selected><?php echo e($tarea['operario_id']); ?></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <?php echo $error->ErrorFormateado("operario"); ?>

    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input type="date" class="form-control" id="inputCity" name="final" value="<?php echo e($tarea['fecha_final']); ?>"><?php echo $error->ErrorFormateado("final"); ?>

    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea type="text" class="form-control" id="inputCity" name="anterior"><?php echo e($tarea['anotacion_inicio']); ?></textarea>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea type="text" class="form-control" id="inputCity" name="posterior"><?php echo e($tarea['anotacion_final']); ?></textarea>
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </form>
  <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\2DAW\CursoPHP\AProyecto\app\views/tareas_modificar.blade.php ENDPATH**/ ?>