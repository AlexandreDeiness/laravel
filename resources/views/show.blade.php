<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Show All</title>
    </head>

    <body>
        @foreach($user as $users)
            <img src="{{$users->name}}" alt="" width="400">
            <br/>
        @endforeach
    </body>
</html>