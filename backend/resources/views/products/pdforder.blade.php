<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div>
            <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
        </div>
        {{-- ORDER HEADER --}}
    <h2>Order Summary</h2>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>User ID:</strong> {{ $order->user_id }}</p>
    <p><strong>Date:</strong> {{ $order->order_date }}</p>

    <div class="section-title">Purchased Items</div>

    <table>
        <thead>
            <tr>
                <th width="10%">Product ID</th>
                <th width="50%">Product Name</th>
                <th width="20%">Quantity</th>
                <th width="20%">Price</th>
            </tr>
        </thead>

        <tbody>
            @php
                $total = 0;
            @endphp

            @foreach ($cart as $item)
                @php
                    $prodId = $item[0];
                    $qte    = $item[1];
                    $prod   = \App\Models\Product::find($prodId);
                    $price  = $prod->price ?? 0;
                    $lineTotal = $price * $qte;
                    $total += $lineTotal;
                @endphp

                <tr>
                    <td>{{ $prodId }}</td>
                    <td>{{ $prod->name ?? 'Unknown Product' }}</td>
                    <td>{{ $qte }}</td>
                    <td>{{ number_format($lineTotal, 2) }} MAD</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    {{-- TOTAL --}}
    <h3 class="right">
        Total: {{ number_format($total, 2) }} MAD
    </h3>
</body>
</html>