

<?php $__env->startSection('title', 'Editar Usuario'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Editar Usuario</h2>

    <form action="<?php echo e(route('adminusuarios.update', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="<?php echo e(old('name', $user->name)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="<?php echo e(old('email', $user->email)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-select">
                <option value=0 <?php echo e($user->role == 0 ? 'selected' : ''); ?>>Usuario</option>
                <option value=1 <?php echo e($user->role == 1 ? 'selected' : ''); ?>>Administrador</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="<?php echo e(route('adminusuarios.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/users/edit-add.blade.php ENDPATH**/ ?>