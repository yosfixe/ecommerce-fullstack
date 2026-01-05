<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    @csrf
    <form action="{{route('products.search')}}">
        <input type="text" name="criterea">
        <input type="submit" value="Search"><br>
    </form>
</body>
</html>