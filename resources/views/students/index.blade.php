<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-header />
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Reg. No</th>
            <th>Action</th>
        </tr>
@foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->lastname." ".$student->firstname }}</td>
        <td>{{ $student->regno }}</td>
        <td>
            <a href="{{ route('student.show', ['id' => $student->id]) }}">View</a>
            <a href="{{ route('student.edit', ['id' => $student->id]) }}">Update</a>
            <a href="{{ route('student.delete', ['id' => $student->id]) }}" onclick="return confirm('You sure about this ?')">Delete</a>
        </td>

    </tr>
@endforeach
    </table>
</body>
</html>
