<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/stock.css')); ?>">
    <title>My Stocks</title>
</head>
<body>
    <div class="container">
        <h2>My Stocks</h2>
        <div class="card-grid">
            <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="stock-card">
                    <div class="stock-title"><strong><?php echo e($stock->stock_name); ?></strong></div>
                    <div class="stock-info">
                        <span>Quantity:</span> <strong><?php echo e($stock->quantity); ?></strong>
                    </div>
                    <div class="stock-info">
                        <span>Purchase Price:</span> <strong><?php echo e($stock->purchase_price); ?></strong>
                    </div>
                    <div class="stock-info">
                        <span>Purchase Date:</span> <strong><?php echo e($stock->purchase_date); ?></strong>
                    </div>
                    <div class="stock-info">
                        <span>Total Value:</span> <strong><?php echo e($stock->purchase_price *  $stock->quantity); ?></strong>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="no-stocks">
                    You have not bought any stocks yet.
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Jay\investment_management\investment-management\resources\views/stock/index.blade.php ENDPATH**/ ?>