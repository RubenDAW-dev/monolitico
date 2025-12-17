

<?php $__env->startSection('title', isset($category) ? 'Editar Categoría' : 'Nueva Categoría'); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e(isset($category) ? 'Editar Categoría' : 'Crear Categoría'); ?></h2>

    <form action="<?php echo e(isset($category) ? route('admincategorias.update', $category->id) : route('admincategorias.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($category)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoría</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="<?php echo e(old('name', $category->name ?? '')); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <?php echo e(isset($category) ? 'Guardar cambios' : 'Crear categoría'); ?>

        </button>
        <a href="<?php echo e(route('admincategorias.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/categories/edit-add.blade.php ENDPATH**/ ?>