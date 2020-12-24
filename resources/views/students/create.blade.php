@extends('main')
@section('title', ':: Create Student ::')

@section('content')

<h1>Create Student</h1>

<x-header />
<form enctype="multipart/form-data" action="@if(isset($student)) {{ route('student.update', ['id' => $student->id]) }} @else{{ route('student.create.save') }}@endif" method="post">
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
    <input type="file" name="passport" id="">@error('passport')
    {{ $message }}
    @enderror <br>
    <input type="submit" value="Submit">

</form>
</body>
</html>

@endsection
