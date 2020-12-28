@extends('main')
@section('title', ':: Upload Student ::')

@section('content')

<h1>Upload Student</h1>

<x-header />
<form enctype="multipart/form-data" action="{{ route('student.upload.save') }}" method="post">
    @csrf

    <input type="file" name="csv" id="">@error('csv')
    <span style="color: red"> {{ $message }}</span>

    @enderror <br>
    <input type="submit" value="Submit">

</form>
</body>
</html>

@endsection
