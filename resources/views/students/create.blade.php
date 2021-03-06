@extends('main')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
@endsection
@section('title', ':: Create Student ::')
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/zcoalni64rhfm3hfq7idsdny6d5cpb1da3w44l1ndlow8usl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')

<h1>Create Student - Tiny Mce</h1>

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
    <input type="file" src="" onchange="previewFile(this)" name="passport" id="">@error('passport')
    <span style="color: red"> {{ $message }}</span>

    @enderror <br>
    <img id="preview" @if (isset($student)) src="{{ URL::to($student->passport)  }}"@endif>
    <br>
    {{-- <textarea name="address" id="" cols="30" rows="10"></textarea><br> --}}
    <input type="submit" value="Submit">

</form>


@endsection

@section('bottomScript')
    <script>
        tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Owonubi JOb Sunday',
   });
   function previewFile(input){
       var file = $("input[type=file]").get(0).files[0];
       if (file){
           var reader = new FileReader();
           reader.onload = function (){
               $("#preview").attr("src",reader.result);
           }
           reader.readAsDataURL(file);
       }
   }
    </script>
@endsection
