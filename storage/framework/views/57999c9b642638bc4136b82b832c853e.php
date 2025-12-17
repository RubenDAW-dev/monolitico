

<?php $__env->startSection('title', 'Detalle de Petición'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Detalle de la Petición</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4><?php echo e($petition->title); ?></h4>
            <p><strong>Descripción:</strong> <?php echo e($petition->description); ?></p>
            <p><strong>Firmantes:</strong> <?php echo e($petition->signers); ?></p>
            <p><strong>Estado:</strong> <?php echo e($petition->status); ?></p>
        </div>
    </div>

    <a href="<?php echo e(route('adminpeticiones.index')); ?>" class="btn btn-secondary mt-3">Volver al listado</a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/petitions/show.blade.php ENDPATH**/ ?>