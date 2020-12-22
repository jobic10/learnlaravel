<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Student</h1>

  <x-header />
    <form action="@if(isset($student)) {{ route('student.update', ['id' => $student->id]) }} @else{{ route('student.create.save') }}@endif" method="post">
        @csrf
        <input value="{{ $student->lastname ?? '' }}" placeholder="Last name" type="text" name="lastname" id="">
        @error('lastname')
            {{ $message }}
        @enderror <br>
        <input value="{{ $student->firstname ?? '' }}" type="text" placeholder="First Name" name="firstname" id=""> @error('firstname')
        {{ $message }}
    @enderror <br>
        <input value="{{ $student->regno ?? '' }}" type="text" name="regno" id="" placeholder="Reg no">@error('regno')
        {{ $message }}
    @enderror <br>
        <input type="submit" value="Submit">

    </form>
</body>
</html>
