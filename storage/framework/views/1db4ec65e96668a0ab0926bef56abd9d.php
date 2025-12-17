

<?php $__env->startSection('title', 'List of Petitions'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="tituloListPetitions">Descubre tu próxima causa</h2>
        <p class="parrafoListPetitions">Explora millones de peticiones y encuentra las que te interesan</p>

        <div class="row">
            <?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 mt-4">
                        <?php if($petition->files->count()): ?>
                            <img class="card-img-top" src="<?php echo e(asset('storage/'.$petition->files->first()->file_path)); ?>" alt="<?php echo e($petition->title); ?>">
                        <?php else: ?>
                            <img class="card-img-top" src="<?php echo e(asset('src/default.jpg')); ?>" alt="Sin imagen">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo e($petition->title); ?></h5>
                            <p class="card-text"><?php echo e(Str::limit($petition->description, 100)); ?></p>
                            <a href="<?php echo e(route('petitions.show', $petition->id)); ?>" class="btn btn-outline-primary mt-auto">
                                🖌️ <?php echo e($petition->signers); ?> Firmas
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/petitions/index.blade.php ENDPATH**/ ?>