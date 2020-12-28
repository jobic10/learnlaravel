<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Image Resize</h2>
    <form action="{{ route('resizeImage') }}" enctype="multipart/form-data" method="post">
        @csrf
    <input type="file" name="image" id="">
    <input type="submit" value="Resize Image">
    </form>
</body>
</html>
