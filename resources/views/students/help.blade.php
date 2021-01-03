@extends('main')
@section('title', ':: View Specific Student ::')

@section('content')
    <h3>Contact Us</h3>
    <form action="{{ route('student.contact.save') }}" method="post">
        @csrf
        <table border='1'>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" id=""></td>
            </tr>
            <tr>
                <th>Message</th>
                <td><input type="text" name="message" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value='Submit'></td>
            </tr>

        </table>
    </form>
@endsection
