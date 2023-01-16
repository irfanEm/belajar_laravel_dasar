<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar CSRF Token</title>
</head>
<body>
    <form action="" method="post">
        <label for="nama">
            <input type="text" name="nama" id="">
        </label>
        <input type="submit" value="say halo">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</body>
</html>
