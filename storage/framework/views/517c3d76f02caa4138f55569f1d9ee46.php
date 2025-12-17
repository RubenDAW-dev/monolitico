

<?php $__env->startSection('title', 'Gestión de Categorías'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Listado de Categorías</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?php echo e(route('admincategorias.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Categoría
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->name); ?></td>
                <td>
                    <a href="<?php echo e(route('admincategorias.show', $category->id)); ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="<?php echo e(route('admincategorias.edit', $category->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <form action="<?php echo e(route('admincategorias.delete', $category->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoria?');">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>