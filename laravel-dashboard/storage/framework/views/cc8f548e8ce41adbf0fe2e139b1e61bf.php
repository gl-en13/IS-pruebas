<?php $__env->startSection('content'); ?>

<div class="mb-6">
    <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 mb-3 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Volver
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Recargar saldo</h1>
    <p class="text-gray-500 text-sm mt-1">Agrega saldo a tu monedero universitario</p>
</div>


<div class="balance-card mb-6">
    <div class="relative z-10">
        <p class="text-blue-200 text-sm">Saldo actual</p>
        <p class="text-3xl font-bold mt-1">$<?php echo e(number_format($wallet->balance, 2)); ?></p>
        <p class="text-blue-300 text-xs mt-2 font-mono">**** **** **** <?php echo e(substr($wallet->card_number, -4)); ?></p>
    </div>
</div>


<div class="card p-5 sm:p-6">
    <form method="POST" action="<?php echo e(route('recharge.store')); ?>" class="space-y-6">
        <?php echo csrf_field(); ?>

        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Monto rápido</label>
            <div class="grid grid-cols-3 gap-2.5">
                <?php $__currentLoopData = [100, 200, 300, 500, 1000, 2000]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" data-amount="<?php echo e($preset); ?>" class="amount-btn">
                    $<?php echo e(number_format($preset, 0)); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">O ingresa un monto personalizado</label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 font-medium text-sm">$</span>
                <input
                    id="amount-input"
                    type="number"
                    name="amount"
                    value="<?php echo e(old('amount')); ?>"
                    placeholder="0.00"
                    min="50"
                    max="5000"
                    step="0.01"
                    class="form-input pl-8"
                />
            </div>
            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-1.5 text-xs text-red-600"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <p class="text-xs text-gray-400 mt-1.5">Mínimo $50 · Máximo $5,000</p>
        </div>

        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Método de pago</label>
            <div class="space-y-2.5">
                <?php $__currentLoopData = [
                    ['tarjeta',      'Tarjeta de débito / crédito', '💳'],
                    ['transferencia','Transferencia bancaria',       '🏦'],
                    ['efectivo',     'Ventanilla (efectivo)',        '💵'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$val, $label, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="flex items-center gap-3 p-3.5 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-300 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                    <input type="radio" name="payment_method" value="<?php echo e($val); ?>" class="w-4 h-4 text-blue-600" <?php echo e(old('payment_method') === $val || ($val === 'tarjeta' && !old('payment_method')) ? 'checked' : ''); ?> />
                    <span class="text-xl"><?php echo e($icon); ?></span>
                    <span class="text-sm font-medium text-gray-700"><?php echo e($label); ?></span>
                </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-1.5 text-xs text-red-600"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn-primary w-full text-base py-3.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Recargar saldo
        </button>
    </form>
</div>


<div class="mt-4 p-4 bg-blue-50 border border-blue-100 rounded-xl flex gap-3">
    <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <p class="text-xs text-blue-700 leading-relaxed">
        Las recargas son procesadas de inmediato. Para pagos por transferencia o ventanilla, el saldo se refleja en un plazo de hasta 24 horas hábiles.
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-dashboard\resources\views/student/recharge.blade.php ENDPATH**/ ?>