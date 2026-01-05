<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
</head>
<body>
        <h1>Welcome Back</h1>
    <div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <h3 style="align-items: flex-end"><a href="{{route('user.logout')}}">Log Out</a></h3>
    @if (session("priv")=="U")
            <h4><a href="{{route('product.cart')}}">Cart</a></h4>
            @endif
    @include('products.search')
    <table border="1" cellpadding="8" style="border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Production Date</th>
            <th>Type</th>
            <th>Category</th>
            <th>Picture</th>
            @if (session('priv')=="A")
            <th><a href="{{route('products.form')}}"><img src="{{asset('icons/add.png')}}" width="20px" /></a></th>
            @endif
        </tr>
        @foreach ($prods as $prod)
        @php
        $inCart = false;
        $qty = 0;

        foreach ($cart as $item) {
            if ($item[0] === $prod->id) {
                $inCart = true;
                $qty = $item[1];
                break;
            }
        }
        @endphp
        <tr>
            <td>{{ $prod->id }}</td>
            @if ($inCart)
            <td style="color: green">{{ $prod->name }}</td>
            @else
            <td>{{ $prod->name }}</td>
            @endif
            <td>{{ $prod->description }}</td>
            <td>{{ $prod->production_date }}</td>
            <td>{{ $prod->type }}</td>
            <td>{{$prod->category->name}}</td>
            {{-- @foreach($cats as $cat)
            @if ($prod->cat_id == $cat->id) <td>{{$cat->name}} @endif</td> 
            @endforeach --}}
            <td><img src="{{asset('pictures/'.$prod->picture)}}" width="80px" /></td>
            @if (session("priv")=="U")
            <td><form action="{{route('products.add2cart')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$prod->id}}">
                <input type="number" value="1" name="qte" min="1" max="10"> 
                <input type="submit" value="Add To Cart">   
            </form></td>
            @endif
            <td><a href="{{route('products.show', ['id'=>$prod->id])}}"><img src="{{asset('icons/show.png')}}" width="20px" /></a></td>
            @if (session("priv")=="A")
            <td><a href="{{route('products.delete', ['id'=>$prod->id])}}"><img src="{{asset('icons/del.png')}}" width="20px" /></a></td>
            <td><a href="{{route('products.edit', ['id'=>$prod->id])}}"><img src="{{asset('icons/edit.jpg')}}" width="20px" /></a></td>
            @endif
        </tr>
        @endforeach
    </table>
    <button><a href="{{route('product.pdf')}}">Download</a></button>
</div>
</body>
</html>

