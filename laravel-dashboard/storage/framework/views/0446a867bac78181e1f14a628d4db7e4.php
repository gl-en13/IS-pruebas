<?php $__env->startSection('title', 'Iniciar sesión'); ?>
<?php $__env->startSection('subtitle', 'Ingresa a tu cuenta estudiantil'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
    <?php echo csrf_field(); ?>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1.5">Correo electrónico</label>
        <input
            type="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            placeholder="tu@universidad.mx"
            class="form-input"
            autocomplete="email"
            required
        />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1.5">Contraseña</label>
        <input
            type="password"
            name="password"
            placeholder="••••••••"
            class="form-input"
            autocomplete="current-password"
            required
        />
    </div>

    <div class="flex items-center justify-between">
        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600">
            Recordarme
        </label>
        <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium">¿Olvidaste tu contraseña?</a>
    </div>

    <button type="submit" class="btn-primary">
        Iniciar sesión
    </button>

    
    <div class="p-3 bg-blue-50 rounded-xl border border-blue-100 text-xs text-blue-700">
        <strong>Demo:</strong> ana@universidad.mx / password
    </div>
</form>

<p class="mt-6 text-center text-sm text-gray-500">
    ¿No tienes cuenta?
    <a href="<?php echo e(route('register')); ?>" class="text-blue-600 hover:text-blue-700 font-semibold">Regístrate</a>
</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-dashboard\resources\views/auth/login.blade.php ENDPATH**/ ?>