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
        <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    </div>
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <label for="email">Enter a Valid email:</label>
        <input type="email" name="email"><br>

        <label for="pass">Enter a Password:</label>
        <input type="password" name="pass"><br>

        <label for="conf">Confirm Password:</label>
        <input type="password" name="conf"><br>

        <input type="submit">
        <input type="reset"><br>

        @if (isset($msg))
        <h4 style="color: red">{{$msg}}</h4>
        @endif
    </form>
</body>
</html>