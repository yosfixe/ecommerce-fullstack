<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
</head>
<body>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" required></textarea><br>

        <label for="date">Production Date:</label>
        <input type="date" name="date" required><br>

        <label for="type">Type:</label>
        <input type="radio" name="type" value="Unit" required>Unit
        <input type="radio" name="type" value="Weight" required>Weight<br>

        <label for="picture">Picture:</label>
        <input type="file" name="picture"><br>

        <label for="category">Category:</label>
        <select name="category">
            @foreach ($cats as $cat)
            <option value={{$cat->id}}>{{$cat->name}}</option>
            @endforeach
        </select><br>

        <input type="submit">
        <input type="reset">
    </form>
</body>
</html>

