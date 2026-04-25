<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 mb-3 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Volver
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Mi Monedero</h1>
    <p class="text-gray-500 text-sm mt-1">Detalles de tu monedero universitario</p>
</div>

<div class="balance-card mb-6">
    <div class="relative z-10">
        <p class="text-blue-200 text-sm font-medium mb-1">Saldo disponible</p>
        <p class="text-4xl font-bold mb-5">$<?php echo e(number_format($wallet->balance, 2)); ?></p>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-blue-200 text-xs mb-0.5">Número de tarjeta</p>
                <p class="text-white font-mono tracking-widest text-sm">**** **** **** <?php echo e(substr($wallet->card_number, -4)); ?></p>
            </div>
            <div class="text-right">
                <p class="text-blue-200 text-xs mb-0.5">Estado</p>
                <span class="inline-flex items-center gap-1 text-xs font-semibold text-green-300">
                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full"></span>
                    <?php echo e($wallet->is_active ? 'Activo' : 'Inactivo'); ?>

                </span>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <div class="card p-4 text-center">
        <p class="text-xs text-gray-500 mb-1">Gastos este mes</p>
        <p class="text-2xl font-bold text-gray-900">$<?php echo e(number_format($monthlySpend, 2)); ?></p>
    </div>
    <div class="card p-4 text-center">
        <p class="text-xs text-gray-500 mb-1">Límite mensual</p>
        <p class="text-2xl font-bold text-gray-900">$<?php echo e(number_format($wallet->monthly_limit, 2)); ?></p>
    </div>
    <div class="card p-4 text-center">
        <p class="text-xs text-gray-500 mb-1">Última recarga</p>
        <p class="text-lg font-bold text-gray-900">
            <?php echo e($lastRecharge ? '$'.number_format($lastRecharge->amount, 2) : 'N/A'); ?>

        </p>
        <?php if($lastRecharge): ?>
        <p class="text-xs text-gray-400"><?php echo e($lastRecharge->formatted_date); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="card p-5 mb-4">
    <h2 class="text-base font-semibold text-gray-900 mb-4">Gasto por categoría</h2>
    <div class="space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php $pct = $monthlySpend > 0 ? ($cat->total / $monthlySpend) * 100 : 0; ?>
        <div>
            <div class="flex justify-between text-sm mb-1">
                <span class="font-medium text-gray-700"><?php echo e($cat->category); ?></span>
                <span class="text-gray-500">$<?php echo e(number_format($cat->total, 2)); ?> (<?php echo e(round($pct)); ?>%)</span>
            </div>
            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-blue-500 rounded-full" style="width: <?php echo e(min($pct, 100)); ?>%"></div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-sm text-gray-400 text-center py-4">Sin gastos registrados este mes.</p>
        <?php endif; ?>
    </div>
</div>

<a href="<?php echo e(route('recharge.index')); ?>" class="btn-primary w-full justify-center text-base py-3.5">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    Recargar saldo
</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-dashboard\resources\views/student/wallet.blade.php ENDPATH**/ ?>