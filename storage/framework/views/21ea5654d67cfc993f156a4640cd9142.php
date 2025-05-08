<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investment Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
</head>
<body>
    <?php echo csrf_field(); ?>
    <div class="dashboard-wrapper">
        <!-- Sidebar (optional, for modern dashboard look) -->
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <nav>
                <a href="#" class="active">Overview</a>
                <a href="<?php echo e(route('mystocks')); ?>">Stocks</a>
                <a href="#">FDs</a>
                <a href="#">Properties</a>
                <form action="/logout" method="POST">
                    <?php echo csrf_field(); ?>
                <button style="margin: auto; padding:10px">logout</button>
            
                </form>
            </nav>
        </aside>
        
        <main class="main-content">
            <div class="container">
                <h1>INVESTMENT MANAGEMENT</h1>
            </div>
            <div class="container">
                <h2>Welcome to Dashboard, <?php echo e(Auth::user()->name); ?></h2>

            </div>
            
            <!-- Dashboard Summary Cards -->
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-title">Total Investment Value</div>
                    <div class="card-value">₹<?php echo e(number_format($totalInvestment, 2)); ?></div>
                </div>
                <div class="card">
                    <div class="card-title">Stocks Investment Value</div>
                    <div class="card-value">₹<?php echo e(number_format($totalvalueStock, 2)); ?></div>
                    <a href="<?php echo e(route('mystocks')); ?>" class="card-link">View My Stocks</a>
                </div>
                <div class="card">
                    <div class="card-title">FDs Value</div>
                    <div class="card-value">₹<?php echo e(number_format($totalvalueFds, 2)); ?></div>
                </div>
                <div class="card">
                    <div class="card-title">Properties Value</div>
                    <div class="card-value">₹<?php echo e(number_format($totalvalueProperties, 2)); ?></div>
                </div>
            </div>
            
            <!-- Add Stock Form -->
            <div class="container">
                <h2>Add Stock</h2>
                <form action="<?php echo e(route('add.stock')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="stock_name" placeholder="Stock Name" required>
                    <input type="number" name="quantity" placeholder="Quantity" min="1" required>
                    <input type="number" name="purchase_price" placeholder="Purchase Price" step="0.01" min="0" required>
                    <label for="purchase_date">Purchase Date:</label>
                    <input type="date" name="purchase_date" placeholder="purchase_date" required>
                    <button type="submit">Add Stock</button>
                </form>
            </div>
            
            <!-- Add FD Form -->
            <div class="container">
                <h2>Add FD</h2>
                <form action="<?php echo e(route('add.fd')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="number" name="amount" placeholder="Amount" required>
                    <input type="number" name="interest_rate" placeholder="Interest Rate (%)" required>
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" required>
                    <label for="maturity_date">Maturity Date:</label>
                    <input type="date" name="maturity_date" required>
                    <input type="text" name="bank_name" placeholder="Bank Name">
                    <input type="text" name="account_number" placeholder="Account Number">
                    <button type="submit">Add Fixed Deposit</button>
                </form>
            </div>
            
            <!-- Add Property Form -->
            <div class="container">
                <h2>Add Property</h2>
                <form action="<?php echo e(route('add.property')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="property_name" placeholder="Property Name" required>
                    <input type="text" name="location" placeholder="Location" required>
                    <input type="number" name="value" placeholder="Value" required>
                    <label for="purchase_date">Purchase Date:</label>
                    <input type="date" name="purchase_date" required>
                    <select name="property_type" required>
                        <option value="" disabled selected>Select Property Type</option>
                        <option value="commercial">Commercial</option>
                        <option value="residential">Residential</option>
                    </select>
                    <textarea name="description" placeholder="Description"></textarea>
                    <button type="submit">Add Property</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Jay\investment_management\investment-management\resources\views/dashboard.blade.php ENDPATH**/ ?>