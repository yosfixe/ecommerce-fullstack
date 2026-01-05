
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
        <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
        <table border="1" cellpadding="8" style="border-collapse: collapse;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Production Date</th>
                <th>Type</th>
                <th>Picture</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            <tr>
            <td>{{ $prod->id }}</td>
            <td>{{ $prod->name }}</td>
            <td>{{ $prod->description }}</td>
            <td>{{ $prod->production_date }}</td>
            <td>{{ $prod->type }}</td>
                        <td>{{ $prod->cat_id}}</td>

            <td>{{ $prod->picture }}</td>
            <td>{{ $prod->created_at }}</td>
            <td>{{ $prod->updated_at }}</td>
        </tr>
        </table>
        <h3><a href="{{route('products.index')}}"><img src="{{asset('icons/back.png')}}" width="60px" /></a></h3>
    </div>
</body>
</html>