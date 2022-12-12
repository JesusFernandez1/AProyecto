<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>

   

   <?php $__env->startSection('mostrarUsuarios'); ?>

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo</th>
         </tr>
      </thead>
      <tbody>
         <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($usuario['usuario_id']); ?></td>
            <td><?php echo e($usuario['nombre']); ?></td>
            <td><?php echo e($usuario['apellido']); ?></td>
            <td><?php echo e($usuario['correo']); ?></td>
            <td><?php echo e($usuario['tipo']); ?></td>
            <td><a href="index.php?controller=login&action=verOneUsuario&id=<?php echo e($usuario['usuario_id']); ?>" class="btn btn-outline-primary" role="button">Modificar</a> <a href="index.php?controller=login&action=verBorrarUsuario&id=<?php echo e($usuario['usuario_id']); ?>" class="btn btn-outline-danger" role="button">Eliminar</a></td>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
   </table>
   <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base_usuarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\2DAW\Desktop\xampp\htdocs\AProyecto\app\views/usuarios_mostrar.blade.php ENDPATH**/ ?>