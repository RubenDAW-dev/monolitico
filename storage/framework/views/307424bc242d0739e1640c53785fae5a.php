

<?php $__env->startSection('title', 'Ver Petición'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <h1 class="tituloPeticion"><?php echo e($petition->title); ?></h1>

        
        <?php if($petition->files->count()): ?>
            <?php $__currentLoopData = $petition->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e(asset('storage/'.$file->file_path)); ?>"
                     alt="<?php echo e($file->name); ?>"
                     class="img-fluid rounded mb-4">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-muted">Esta petición no tiene imágenes asociadas.</p>
        <?php endif; ?>

        <p class="textoPeticion"><?php echo e($petition->description); ?></p>

        <div class="mb-3">
            <small class="text-secondary">
                Categoría: <?php echo e($petition->category->name ?? 'Sin categoría'); ?> <br>
                Autor: <?php echo e($petition->user->name ?? 'Anónimo'); ?>

            </small>
        </div>

        <div class="sticky-sidebar card shadow-sm p-4">
            <h4>Firma esta petición</h4>
            <form action="<?php echo e(route('petitions.sign', $petition->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger w-100">Firmar</button>
            </form>
            <div class="mt-4">
                <p><strong><?php echo e($petition->signers); ?></strong> personas ya han firmado</p>
            </div>

            
            <?php if(auth()->check() && auth()->id() === $petition->user_id): ?>
                <div class="mt-3">
                    <a href="<?php echo e(route('petitions.edit', $petition->id)); ?>" class="btn btn-warning w-100">
                        Editar petición
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/petitions/show.blade.php ENDPATH**/ ?>