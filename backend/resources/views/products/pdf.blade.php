<!DOCTYPE html>
<html>
    <head>
    <div>
        <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    </div>
</head>
<body>

<h2>Product List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Production Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prods as $prod)
            <tr>
                <td>{{ $prod->id }}</td>
                <td>{{ $prod->name }}</td>
                <td>{{ $prod->type }}</td>
                <td>{{ $prod->category->name }}</td>
                <td>{{ $prod->production_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
