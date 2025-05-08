<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/stock.css') }}">
    <title>My Stocks</title>
</head>
<body>
    <div class="container">
        <h2>My Stocks</h2>
        <div class="card-grid">
            @forelse($stocks as $stock)
                <div class="stock-card">
                    <div class="stock-title"><strong>{{ $stock->stock_name }}</strong></div>
                    <div class="stock-info">
                        <span>Quantity:</span> <strong>{{ $stock->quantity }}</strong>
                    </div>
                    <div class="stock-info">
                        <span>Purchase Price:</span> <strong>{{ $stock->purchase_price }}</strong>
                    </div>
                    <div class="stock-info">
                        <span>Purchase Date:</span> <strong>{{ $stock->purchase_date }}</strong>
                    </div>
                    <div class="stock-info">
                        <span>Total Value:</span> <strong>{{ $stock->purchase_price *  $stock->quantity }}</strong>
                    </div>
                </div>
            @empty
                <div class="no-stocks">
                    You have not bought any stocks yet.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
