<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>
   

   <?php $__env->startSection('mostrarExtension'); ?>

   <h1>¿Estas seguro de eliminar la tarea?</h1>

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Poblacion</th>
            <th scope="col">Codigo postal</th>
            <th scope="col">Provincia</th>
            <th scope="col">Creacion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Estado</th>
         </tr>
      </thead>
      <tbody>
         <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($tarea['DNI']); ?></td>
            <td><?php echo e($tarea['nombre']); ?></td>
            <td><?php echo e($tarea['apellido']); ?></td>
            <td><?php echo e($tarea['poblacion']); ?></td>
            <td><?php echo e($tarea['codigo_postal']); ?></td>
            <td><?php echo e($tarea['provincia']); ?></td>
            <td><?php echo e($tarea['fecha_creacion']); ?></td>
            <td><?php echo e($tarea['telefono']); ?></td>
            <td><?php echo e($tarea['estado_tarea']); ?></td>
            <td><a href="index.php?controller=tareas&action=delete&id=<?php echo e($tarea['tarea_id']); ?>" class="btn btn-outline-success" role="button">Si</a> <a href="index.php?controller=tareas&action=ver" class="btn btn-outline-danger" role="button">No</a>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
   </table>
   <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\2DAW\Desktop\xampp\htdocs\AProyecto\app\views/tareas_eliminar.blade.php ENDPATH**/ ?>