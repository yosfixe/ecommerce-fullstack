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
            <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
        </div>
        <h1>{{session('login')}} Cart</h1>
         @foreach ($cart as $item)
        <h4>
            Product ID: {{ $item[0] }} |
            Quantity: {{ $item[1] }}

            <form method="POST" action="{{ route('cart.increase', $item[0]) }}" style="display:inline">
                @csrf
                <button type="submit">+</button>
            </form>
            <form method="POST" action="{{ route('cart.decrease', $item[0]) }}" style="display:inline">
                @csrf
                <button type="submit">-</button>
            </form>
        </h4>
        <br>
        @endforeach
        <button value="Order"><a href="{{route('product.order')}}">Order</a></button>
            <br>
        <h3><a href="{{route('products.index')}}"><img src="{{asset('icons/back.png')}}" width="60px" /></a></h3>
</body>
</html>