<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>
   

   <?php $__env->startSection('mostrarExtension'); ?>

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">ID</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Correo</th>
            <th scope="col">Direccion</th>
            <th scope="col">Poblacion</th>
            <th scope="col">Codigo postal</th>
            <th scope="col">Provincia</th>
            <th scope="col">Estado</th>
            <th scope="col">Creacion</th>
            <th scope="col">Operario</th>
            <th scope="col">Finalizacion</th>
            <th scope="col">Anotacion inicial</th>
            <th scope="col">Anotacion inicial</th>
         </tr>
      </thead>
      <tbody>
         <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($tarea['tarea_id']); ?></td>
            <td><?php echo e($tarea['DNI']); ?></td>
            <td><?php echo e($tarea['nombre']); ?></td>
            <td><?php echo e($tarea['apellido']); ?></td>
            <td><?php echo e($tarea['telefono']); ?></td>
            <td><?php echo e($tarea['descripcion']); ?></td>
            <td><?php echo e($tarea['correo']); ?></td>
            <td><?php echo e($tarea['direccion']); ?></td>
            <td><?php echo e($tarea['poblacion']); ?></td>
            <td><?php echo e($tarea['codigo_postal']); ?></td>
            <td><?php echo e($tarea['provincia']); ?></td>
            <td><?php echo e($tarea['estado_tarea']); ?></td>
            <td><?php echo e($tarea['fecha_creacion']); ?></td>
            <td><?php echo e($tarea['operario_id']); ?></td>
            <td><?php echo e($tarea['fecha_final']); ?></td>
            <td><?php echo e($tarea['anotacion_inicio']); ?></td>
            <td><?php echo e($tarea['anotacion_final']); ?></td>
            
            <td><a href="index.php?controller=tareas&action=ModificarUnaTarea&id=<?php echo e($tarea['tarea_id']); ?>" class="btn btn-outline-primary" role="button">Modificar</a> <a href="index.php?controller=tareas&action=delete&id=<?php echo e($tarea['tarea_id']); ?>" class="btn btn-outline-danger" role="button">Eliminar</a>
            <a href="index.php?controller=tareas&action=completar&id=<?php echo e($tarea['tarea_id']); ?>" class="btn btn-outline-success" role="button">Completar</a></td>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
   </table>
   <style>
      nav {
         position: absolute;
         left: -20;
      }
   </style>
   <nav aria-label="Page navigation example">
      <ul class="pagination">
         <li class="page-item"><a class="page-link" href="index.php?controller=tareas&action=verCompletaPaginacion&pagina=<?php echo e($pagina-1); ?>">Anterior</a></li>
         <?php for($i = 1; $i <= $paginas; $i++): ?> <li class="page-item"><a class="page-link" href="index.php?controller=tareas&action=verCompletaPaginacion&pagina=<?php echo e($i); ?>"><?php echo e($i); ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="index.php?controller=tareas&action=verCompletaPaginacion&pagina=<?php echo e($pagina+1); ?>">Siguiente</a></li>
      </ul>
   </nav>
   <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\2DAW\CursoPHP\AProyecto\app\views/tareas_mostrar_completa.blade.php ENDPATH**/ ?>