

<?php $__env->startSection('title', isset($petition) ? 'Editar Petición' : 'Nueva Petición'); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e(isset($petition) ? 'Editar Petición' : 'Crear Petición'); ?></h2>

    <form action="<?php echo e(isset($petition) ? route('adminpeticiones.update', $petition->id) : route('adminpeticiones.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($petition)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control"
                   value="<?php echo e(old('title', $petition->title ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control" rows="4" required><?php echo e(old('description', $petition->description ?? '')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="recipient" class="form-label">Destinatario</label>
            <input type="text" name="recipient" id="recipient" class="form-control" value="<?php echo e(old('recipient', $petition->recipient ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="signers" class="form-label">Firmantes</label>
            <input type="number" name="signers" id="signers" class="form-control"
                   value="<?php echo e(old('signers', $petition->signers ?? 0)); ?>">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Selecciona categoría</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"
                            <?php echo e((isset($petition) && $petition->category_id == $category->id) ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select">
                <option value="pending" <?php echo e((isset($petition) && $petition->status === 'pending') ? 'selected' : ''); ?>>Pending</option>
                <option value="accepted" <?php echo e((isset($petition) && $petition->status === 'accepted') ? 'selected' : ''); ?>>Accepted</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <?php echo e(isset($petition) ? 'Guardar cambios' : 'Crear petición'); ?>

        </button>
        <a href="<?php echo e(route('adminpeticiones.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/petitions/edit-add.blade.php ENDPATH**/ ?>