

<?php $__env->startSection('title', 'Gestión de Usuarios'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Listado de Usuarios</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="<?php echo e(route('adminusuarios.create')); ?>" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Nuevo Usuario
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php if(session('error')): ?>
            <script>
                alert("<?php echo e(session('error')); ?>");
            </script>
        <?php endif; ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->role ?? 'Usuario'); ?></td>
                <td>
                    <a href="<?php echo e(route('adminusuarios.show', $user->id)); ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="<?php echo e(route('adminusuarios.edit', $user->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <form action="<?php echo e(route('adminusuarios.delete', $user->id)); ?>"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/users/index.blade.php ENDPATH**/ ?>