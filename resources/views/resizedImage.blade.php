<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    <h2>Image Resize</h2>
    <form action="{{ route('resizeImage') }}" enctype="multipart/form-data" method="post">
        @csrf
    <input type="file" name="image" id="">
    <input type="submit" value="Resize Image">
    </form>
    <hr>
    DropZone
    <form class="dropzone dz-clickable" id='image-upload' action="{{ route('dropZone') }}" enctype="multipart/form-data" method="post">
        @csrf
        <span class="dz-dafault dz-message"></span><span>Drop Files Here To Upload</span>
        <div class="">
            <h3 class="text-center">Upload Image By Click On Box</h3>
        </div>
    <input type="submit" value="Resize Image">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>

</body>
</html>
