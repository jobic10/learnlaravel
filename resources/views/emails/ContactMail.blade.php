@extends('main')
@section('title', ':: New Contact Us Form Message::')

@section('content')
<h3>New Message --- Contact Us</h3>
<p>Name : {{ $details['name'] }}</p>
<p>Email : {{ $details['email'] }}</p>
<p>Message : {{ $details['message'] }}</p>
</body>
</html>

@endsection
