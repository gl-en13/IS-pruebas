<?php $__env->startSection('content'); ?>

<div class="mb-6">
    <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 mb-3 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Volver
    </a>
    <h1 class="text-2xl font-bold text-gray-900">Todos los Movimientos</h1>
    <p class="text-gray-500 text-sm mt-1">Historial completo de transacciones</p>
</div>


<div class="card p-4 mb-5">
    <form method="GET" action="<?php echo e(route('movements.index')); ?>" class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <select name="type" class="form-input text-sm">
            <option value="">Todos los tipos</option>
            <option value="cargo"  <?php echo e(request('type') === 'cargo'  ? 'selected' : ''); ?>>Cargos</option>
            <option value="abono"  <?php echo e(request('type') === 'abono'  ? 'selected' : ''); ?>>Abonos</option>
        </select>

        <select name="category" class="form-input text-sm">
            <option value="">Todas las categorías</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($cat); ?>" <?php echo e(request('category') === $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <input type="date" name="from" value="<?php echo e(request('from')); ?>" class="form-input text-sm" placeholder="Desde" />
        <input type="date" name="to"   value="<?php echo e(request('to')); ?>"   class="form-input text-sm" placeholder="Hasta" />

        <div class="col-span-2 sm:col-span-4 flex gap-2 justify-end">
            <a href="<?php echo e(route('movements.index')); ?>" class="btn-secondary text-sm px-4 py-2.5">Limpiar</a>
            <button type="submit" class="btn-primary text-sm px-4 py-2.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0014 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 018 21v-7.586a1 1 0 00-.293-.707L1.293 6.707A1 1 0 011 6V4z"/></svg>
                Filtrar
            </button>
        </div>
    </form>
</div>


<div class="card">
    
    <div class="flex items-center justify-between px-5 pt-4 pb-3 border-b border-slate-50">
        <p class="text-sm text-gray-500">
            <span class="font-semibold text-gray-900"><?php echo e($transactions->total()); ?></span> movimiento<?php echo e($transactions->total() !== 1 ? 's' : ''); ?>

        </p>
        <div class="flex gap-3 text-xs">
            <span class="badge-green">Saldo: $<?php echo e(number_format($wallet->balance, 2)); ?></span>
        </div>
    </div>

    <div class="divide-y divide-slate-50">
        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="flex items-center justify-between px-5 py-3.5 hover:bg-slate-50 transition-colors">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0
                    <?php echo e($tx->type === 'abono' ? 'bg-green-50' : 'bg-slate-50'); ?>">
                    <?php if($tx->category === 'Cafetería'): ?> ☕
                    <?php elseif($tx->category === 'Librería'): ?> 📚
                    <?php elseif($tx->category === 'Impresiones'): ?> 🖨️
                    <?php elseif($tx->category === 'Recarga'): ?> 💳
                    <?php elseif($tx->category === 'Laboratorio'): ?> 🔬
                    <?php elseif($tx->category === 'Deportes'): ?> ⚽
                    <?php else: ?> 💰
                    <?php endif; ?>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900"><?php echo e($tx->category); ?></p>
                    <p class="text-xs text-gray-400"><?php echo e($tx->formatted_date); ?></p>
                    <p class="text-xs text-gray-300 font-mono"><?php echo e($tx->reference); ?></p>
                </div>
            </div>
            <div class="text-right flex-shrink-0 ml-4">
                <p class="text-sm font-bold <?php echo e($tx->type === 'abono' ? 'text-green-600' : 'text-gray-900'); ?>">
                    <?php echo e($tx->type === 'abono' ? '+' : '−'); ?>$<?php echo e(number_format($tx->amount, 2)); ?>

                </p>
                <span class="<?php echo e($tx->type === 'abono' ? 'badge-green' : 'badge-blue'); ?>">
                    <?php echo e($tx->type === 'abono' ? 'Abono' : 'Cargo'); ?>

                </span>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="py-16 text-center">
            <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-3xl">📋</div>
            <p class="text-gray-500 font-medium">Sin movimientos</p>
            <p class="text-gray-400 text-sm mt-1">Prueba con otros filtros o realiza tu primera recarga.</p>
            <a href="<?php echo e(route('recharge.index')); ?>" class="btn-primary inline-flex mt-4 text-sm px-5 py-2.5">Recargar ahora</a>
        </div>
        <?php endif; ?>
    </div>

    
    <?php if($transactions->hasPages()): ?>
    <div class="px-5 py-4 border-t border-slate-50">
        <?php echo e($transactions->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-dashboard\resources\views/student/movements.blade.php ENDPATH**/ ?>