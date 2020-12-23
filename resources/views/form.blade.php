@extends('main')
<h2>Form Validation</h2>
<form action="" method="post">
    @csrf
    <table border='1'>
        <tr>
            <th>Username</th>
            <td>
                <input type="text" name="username" id="">
                @error('username')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <input type="email" name="email" id="">
                @error('email')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Password</th>
            <td>
                <input type="password" name="password" id="">
                @error('password')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" id="">
        </tr>
    </table>
</form>
