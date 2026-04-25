<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 mb-3 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Volver
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Soporte</h1>
    <p class="text-gray-500 text-sm mt-1">¿Necesitas ayuda? Contáctanos</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <?php $__currentLoopData = [
        ['📞','Teléfono','442 123 4567','Lun–Vie 8–18 h'],
        ['✉️','Correo','soporte@universidad.mx','Respuesta en 24 h'],
        ['🏢','Ventanilla','Edificio Admin, P.B.','Lun–Vie 9–17 h'],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$icon,$title,$value,$sub]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card p-4 text-center">
        <div class="text-3xl mb-2"><?php echo e($icon); ?></div>
        <p class="text-sm font-semibold text-gray-900"><?php echo e($title); ?></p>
        <p class="text-sm text-blue-600 font-medium mt-0.5"><?php echo e($value); ?></p>
        <p class="text-xs text-gray-400 mt-0.5"><?php echo e($sub); ?></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="card p-5">
    <h2 class="text-base font-semibold text-gray-900 mb-4">Enviar un mensaje</h2>
    <form method="POST" action="<?php echo e(route('support.store')); ?>" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Asunto</label>
            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="¿En qué podemos ayudarte?" class="form-input" required />
            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Mensaje</label>
            <textarea name="message" rows="5" placeholder="Describe tu situación con detalle..." class="form-input resize-none" required><?php echo e(old('message')); ?></textarea>
            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn-primary px-6 py-2.5 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            Enviar mensaje
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-dashboard\resources\views/student/support.blade.php ENDPATH**/ ?>