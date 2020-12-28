@extends('main')
@section('title', ':: View Students ::')
@section('style')
<style>
table{
    border: 1px solid blue;
    border-collapse: collapse;
    width:100%;
}
td, th{
    border: 1px solid green;
    padding: 8px;
}
tr:nth-child(even){
    background-color: aqua;
}
th{
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: lightgreen;

}

</style>
@endsection
@section('content')

<table>
    <tr>
        <th style="width: 10%">ID</th>
        <th style="width: 60%">Name</th>
        <th style="width: 30%">Reg. No</th>
    </tr>
@foreach ($students as $student)
<tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->lastname." ".$student->firstname }}</td>
    <td>{{ $student->regno }}</td>


</tr>
@endforeach
</table>
{{-- {{ $students->links() }} --}}

@endsection
