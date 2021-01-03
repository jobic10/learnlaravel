@extends('main')
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/zcoalni64rhfm3hfq7idsdny6d5cpb1da3w44l1ndlow8usl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
@endsection
@section('title', ':: Student Contact Us Form ::')

@section('content')
<x-header />

    <h3>Contact Us</h3>
    <form action="{{ route('student.contact.save') }}" method="post">
        @csrf
        <table border='1'>
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="name" id="">
                    @error('name')
                        {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" name="email" id="">
                    @error('email')
                        {{ $message }}
                    @enderror</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>
                    <input type="text" name="message" id="">
                    @error('message')
                        {{ $message }}
                    @enderror</td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value='Submit'></td>
            </tr>

        </table>
    </form>
@endsection
