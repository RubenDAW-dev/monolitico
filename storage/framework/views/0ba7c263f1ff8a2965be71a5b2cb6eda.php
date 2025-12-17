

<?php $__env->startSection('title', 'Mis Peticiones'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2>Mis Peticiones</h2>

        <?php if($petitions->count()): ?>
            <ul class="list-group">
                <?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <h5><?php echo e($petition->title); ?></h5>
                        <p><?php echo e(Str::limit($petition->description, 100)); ?></p>
                        <a href="<?php echo e(route('petitions.show', $petition->id)); ?>" class="btn btn-sm btn-primary">
                            Ver
                        </a>
                        <a href="<?php echo e(route('petitions.edit', $petition->id)); ?>" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="mt-3">
                <?php echo e($petitions->links()); ?>

            </div>
        <?php else: ?>
            <p>No has creado ninguna petición todavía.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/petitions/mine.blade.php ENDPATH**/ ?>