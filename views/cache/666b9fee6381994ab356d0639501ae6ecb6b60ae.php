<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>
   <h1>Ver datos de las tareas</h1>
   <table border="1">
      <tr>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>NIF/CIF</th>
         <th>poblacion</th>
         <th>codigo_postal</th>
         <th>provincia</th>
         <th>fecha_creacion</th>
         <th>telefono</th>
      </tr>
      <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($tarea['NIF/CIF']); ?></td>
            <td><?php echo e($tarea['nombre']); ?></td>
            <td><?php echo e($tarea['apellido']); ?></td>
            <td><?php echo e($tarea['poblacion']); ?></td>
            <td><?php echo e($tarea['codigo_postal']); ?></td>
            <td><?php echo e($tarea['provincia']); ?></td>
            <td><?php echo e($tarea['fecha_creacion']); ?></td>
            <td><?php echo e($tarea['telefono']); ?></td>
         </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </table>
</body>

</html><?php /**PATH C:\Users\2DAW\Desktop\xampp\htdocs\2DDAW\CursoPHP\AProyecto\app\views/tareas_mostrar.blade.php ENDPATH**/ ?>