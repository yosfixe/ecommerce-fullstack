<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
</head>
<body>
    <form action="{{route('products.update')}}" method="POST">
        @csrf

        <label for="id">ID:</label>
        <input type="number" name="id" value="{{$prod->id}}" readonly><br>

        <label for="name" >Name:</label>
        <input type="text" name="name" value="{{$prod->name}}" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" required>{{$prod->description}}</textarea><br>

        <label for="date">Production Date:</label>
        <input type="date" name="date" value="{{$prod->production_date}}" required><br>

        <label for="type">Type:</label>
        @if ($prod->type=='Unit')
        <input type="radio" name="type" value="Unit" required checked>Unit
        <input type="radio" name="type" value="Weight" required>Weight<br>
        @else 
        <input type="radio" name="type" value="Unit" required>Unit
        <input type="radio" name="type" value="Weight" required checked>Weight<br>
        @endif

        <label for="picture">Picture:</label>
        <input type="file" name="picture" value="{{$prod->picture}}"><br>

        <label for="category">
            <select>
            @foreach($cats as $cat)
            <option value={{$cat->id}} @if($cat->id == $prod->cat_id) selected @endif>{{$cat->name}}</option>
            @endforeach
            </select>
        </label>

        <input type="submit">
        <input type="reset">
    </form>
</body>
</html>

