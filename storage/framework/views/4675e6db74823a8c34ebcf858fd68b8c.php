

<?php $__env->startSection('title', 'Create Petition'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="h2CrearPetition mt-3">Demos el primer paso hacia el cambio</h2>

        <form action="<?php echo e(route('petitions.store')); ?>" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label for="title" class="form-label fw-semibold">Título de la petición</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
            </div>

            <div class="mb-4">
                <label for="recipient" class="form-label fw-semibold">Destinatario</label>
                <input type="text" class="form-control" id="recipient" name="recipient" required>
            </div>


            <div class="mb-4">
                <label for="category_id" class="form-label fw-semibold">Categoría</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label fw-semibold">Imagen (opcional)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    Crear petición
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/petitions/show.blade.php ENDPATH**/ ?>