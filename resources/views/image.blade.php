<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Test image</title>
    </head>

    <body>
    <form action="store" method="post" enctype="multipart/form-data">
        <label for="name">name</label>
        <input type="text" name="name"><br/>
        
        <label for="image"></label>
        <input type="file" name="image"><br/>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <input type="submit" name="submit" value="submit">
    </form>
    </body>
</html>