<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Be present above all else. - Naval Ravikant -->
    <form action="{{route('user.login')}}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit">
        <input type="reset"><br>

        @if (isset($msg))
        <h4 style="color: red">{{$msg}}</h4>
        @endif
    </form>
</body>
</html>