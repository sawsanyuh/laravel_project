<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>hello ,{{$bladeVar}}</h2>
    @if ($value >20)
    <div style="background:orange ;"><h5>value is greater than 20</h5></div>
    @elseif ($value >10)
    <div style="background:green ;"><h5>value is greater than 10</h5></div>
    @else 
    <div style="background:red ;"><h5>value is idk else...</h5></div>
    @endif
    @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }} 
    @endfor
    @foreach ($users as $user)
    <p>This is user {{ $user['id'] }}</p>
@endforeach
</body>
</html>