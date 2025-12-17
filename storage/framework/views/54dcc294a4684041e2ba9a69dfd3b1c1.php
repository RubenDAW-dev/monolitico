

<?php $__env->startSection('title', 'Gestión de Peticiones'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Listado de Peticiones</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="<?php echo e(route('adminpeticiones.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Petición
        </a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Firmantes</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($petition->id); ?></td>
                <td><?php echo e($petition->title); ?></td>
                <td><?php echo e(Str::limit($petition->description, 50)); ?></td>
                <td><?php echo e($petition->signers); ?></td>
                <td><?php echo e($petition->status); ?></td>
                <td>
                    <a href="<?php echo e(route('adminpeticiones.show', $petition->id)); ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="<?php echo e(route('adminpeticiones.edit', $petition->id)); ?>"
                       class="btn btn-warning btn-sm">Editar</a>
                    <form action="<?php echo e(route('adminpeticiones.delete', $petition->id)); ?>"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta petición?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                        <?php if(session('error')): ?>
                            <script>
                                alert("<?php echo e(session('error')); ?>");
                            </script>
                        <?php endif; ?>
                    </form>

                    <form action="<?php echo e(route('adminpeticiones.estado', $petition->id)); ?>" method="POST"
                          style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <button class="btn btn-success btn-sm">
                            Cambiar Estado
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/admin/petitions/index.blade.php ENDPATH**/ ?>