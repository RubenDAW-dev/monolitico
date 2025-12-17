

<?php $__env->startSection('title', 'Detalle de Usuario'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Detalle del Usuario</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> <?php echo e($user->id); ?></p>
            <p><strong>Nombre:</strong> <?php echo e($user->name); ?></p>
            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
            <p><strong>Rol:</strong> <?php echo e($user->role ?? 'Usuario'); ?></p>
            <p><strong>Creado:</strong> <?php echo e($user->created_at->format('d/m/Y H:i')); ?></p>
        </div>
    </div>

    <a href="<?php echo e(route('adminusuarios.index')); ?>" class="btn btn-secondary mt-3">Volver al listado</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/users/show.blade.php ENDPATH**/ ?>