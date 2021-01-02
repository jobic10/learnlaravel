@extends('main')
@section('title', ':: View Specific Student ::')

@section('content')
    <h3>
       Student name : {{ $student->lastname }}
        {{ $student->firstname }}
        ({{ $student->regno }})
        <img src="{{ asset("passport/") }}/{{ $student->passport }}" alt="">
        {{-- <img src="{{ URL::to("passport/") }}/{{ $student->passport }}" alt=""> --}}
       <hr>
       Supervised by : {{ $student->supervisor }}
    </h3>
</body>
</html>

@endsection
