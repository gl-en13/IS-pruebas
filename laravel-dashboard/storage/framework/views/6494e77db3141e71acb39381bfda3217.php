<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 mb-3 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Volver
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Configuración</h1>
    <p class="text-gray-500 text-sm mt-1">Administra tu perfil y preferencias</p>
</div>


<div class="card p-5 mb-5 flex items-center gap-4">
    <div class="avatar" style="width:3.5rem;height:3.5rem;font-size:1.25rem">
        <?php echo e(substr($user->name,0,1)); ?><?php echo e((strpos($user->name,' ')!==false ? substr($user->name,strpos($user->name,' ')+1,1) : '')); ?>

    </div>
    <div>
        <p class="font-semibold text-gray-900"><?php echo e($user->name); ?></p>
        <p class="text-sm text-gray-500"><?php echo e($user->career ?? 'Sin carrera'); ?> · <?php echo e($user->student_id); ?></p>
        <p class="text-xs text-gray-400"><?php echo e($user->email); ?></p>
    </div>
</div>


<div class="card p-5 mb-5">
    <h2 class="text-base font-semibold text-gray-900 mb-4">Datos personales</h2>
    <form method="POST" action="<?php echo e(route('profile.update')); ?>" class="space-y-4">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nombre completo</label>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" class="form-input" required />
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Correo electrónico</label>
            <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" class="form-input" required />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Carrera</label>
            <input type="text" name="career" value="<?php echo e(old('career', $user->career)); ?>" class="form-input" />
        </div>
        <button type="submit" class="btn-primary px-6 py-2.5 text-sm">Guardar cambios</button>
    </form>
</div>


<div class="card p-5">
    <h2 class="text-base font-semibold text-gray-900 mb-4">Cambiar contraseña</h2>
    <form method="POST" action="<?php echo e(route('profile.password')); ?>" class="space-y-4">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Contraseña actual</label>
            <input type="password" name="current_password" class="form-input" />
            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nueva contraseña</label>
            <input type="password" name="password" class="form-input" />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-input" />
        </div>
        <button type="submit" class="btn-secondary px-6 py-2.5 text-sm">Actualizar contraseña</button>
    </form>
</div>


<div class="mt-5 pt-5 border-t border-gray-100">
    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="inline-flex items-center gap-2 text-sm text-red-600 hover:text-red-700 font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Cerrar sesión
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-dashboard\resources\views/student/config.blade.php ENDPATH**/ ?>