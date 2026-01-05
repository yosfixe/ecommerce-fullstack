<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Card Payment</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div>
            <!-- We must ship. - Taylor Otwell -->
        </div>
</head>
<body>

<div>
    <h2>Card Payment</h2>

    <div>
        <img src="{{ asset('icons/visa.png') }}" alt="Visa">
        <img src="{{ asset('icons/mastercard.png') }}" alt="Mastercard">
        <img src="{{ asset('icons/amex.png') }}" alt="Amex">
    </div>

    <form>
        <div>
            <label>Cardholder Name</label>
            <input type="text" placeholder="John Doe">
        </div>

        <div>
            <label>Card Number</label>
            <input type="text" placeholder="1234 5678 9012 3456">
        </div>

        <div class="row">
            <div>
                <label>Expiry Date</label>
                <input type="text" placeholder="MM / YY">
            </div>
            <div>
                <label>CVV</label>
                <input type="password" placeholder="123">
            </div>
        </div>

        <button type="button" class="pay-btn" onclick="{{route('products.index')}}">
            Pay Now
        </button>
    </form>

    <div class="back-link">
        <a href="{{ route('products.index') }}">← Back to shop</a>
    </div>
</div>

</body>
</html>
