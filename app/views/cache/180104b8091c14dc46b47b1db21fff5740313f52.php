<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>
   

   <?php $__env->startSection('mostrarUsuarios'); ?>

   <h1>¿Estas seguro de eliminar el usuario?</h1>

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo</th>
         </tr>
      </thead>
      <tbody>
         <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($usuario['nombre']); ?></td>
            <td><?php echo e($usuario['apellido']); ?></td>
            <td><?php echo e($usuario['correo']); ?></td>
            <td><?php echo e($usuario['tipo']); ?></td>
            <td><a href="index.php?controller=login&action=borrarUsuario&id=<?php echo e($usuario['usuario_id']); ?>" class="btn btn-outline-success" role="button">Si</a> <a href="index.php?controller=login&action=login" class="btn btn-outline-danger" role="button">No</a>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
   </table>
   <?php $__env->stopSection(); ?>
</body>
</html>
<?php echo $__env->make('base_usuarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\2DAW\Desktop\xampp\htdocs\AProyecto\app\views/usuarios_eliminar.blade.php ENDPATH**/ ?>