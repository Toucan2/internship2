<!doctype html>
<html>
    <head>
    </head>
    <body>
        @foreach ($users as $user)
        <h5>{{ $user->id }}</h5>
        <h5>{{ $user->name }}</h5>
        <h5>{{ $user->description }}</h5>
        <br><br>
        @endforeach
    </body>
</html>