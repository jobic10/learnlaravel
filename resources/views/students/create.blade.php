<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Post</h1>

    @if(Session::has('response'))
    <h4>{{ Session::get('response') }}</h4>
    @endif
    <form action="@if($student) {{ route() }} @else{{ route('student.create.save') }}@endif" method="post">
        @csrf
        <input placeholder="Last name" type="text" name="lastname" id="">
        @error('lastname')
            {{ $message }}
        @enderror <br>
        <input type="text" placeholder="First Name" name="firstname" id=""> @error('firstname')
        {{ $message }}
    @enderror <br>
        <input type="text" name="regno" id="" placeholder="Reg no">@error('regno')
        {{ $message }}
    @enderror <br>
        <input type="submit" value="Submit">

    </form>
</body>
</html>
