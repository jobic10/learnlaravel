@extends('main')
@section('title', ':: Create Student ::')

@section('content')

<h1>Create Student</h1>

<x-header />
<form enctype="multipart/form-data" action="@if(isset($student)) {{ route('student.update', ['id' => $student->id]) }} @else{{ route('student.create.save') }}@endif" method="post">
    @csrf
    <input value="{{ $student->lastname ?? '' }}" placeholder="Last name" type="text" name="lastname" id="">
    @error('lastname')
    <span style="color: red"> {{ $message }}</span>
    @enderror <br>
    <input value="{{ $student->firstname ?? '' }}" type="text" placeholder="First Name" name="firstname" id=""> @error('firstname')
    <span style="color: red"> {{ $message }}</span>

    @enderror <br>
    <input value="{{ $student->regno ?? '' }}" type="text" name="regno" id="" placeholder="Reg no">@error('regno')
    <span style="color: red"> {{ $message }}</span>

    @enderror <br>
    <input type="file" name="passport" id="">@error('passport')
    <span style="color: red"> {{ $message }}</span>

    @enderror <br>
    <input type="submit" value="Submit">

</form>
</body>
</html>

@endsection
