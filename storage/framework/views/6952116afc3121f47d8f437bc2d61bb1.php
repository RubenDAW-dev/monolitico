<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
            <img class="icoHeader" src="<?php echo e(asset('src/ico.jpg')); ?>" alt="iconoPrincipal" style="height: 55px; width: auto;"/>
        </a>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="<?php echo e(route('adminpeticiones.index')); ?>" class="nav-link text-white">
                    <i class="bi bi-inbox me-2"></i> Peticiones
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="<?php echo e(route('admincategorias.index')); ?>" class="nav-link text-white">
                    <i class="bi bi-tags me-2"></i> Categorías
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="<?php echo e(route('adminusuarios.index')); ?>" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            </li>
            <li class="nav-item mt-4">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="p-4 flex-grow-1 bg-light">
        <div class="card shadow-sm">
            <div class="card-body">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </main>
</div>

<!-- Bootstrap JS + Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
<?php /**PATH C:\Users\Alumno\Desktop\monolitico-master\resources\views/layouts/admin.blade.php ENDPATH**/ ?>