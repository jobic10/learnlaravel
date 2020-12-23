@extends('main')
@section('title', ':: View Specific Student ::')

@section('content')
    <h3>
       Student name : {{ $student->lastname }}
        {{ $student->firstname }}
        ({{ $student->regno }})
       <hr>
       Supervised by : {{ $student->supervisor }}
    </h3>
</body>
</html>

@endsection
