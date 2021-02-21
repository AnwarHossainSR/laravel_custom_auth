<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
           <td> Name : {{ $loggedUserInfo->name }}</td>
        </tr>
        <tr>
           <td> Email : {{ $loggedUserInfo->email }}</td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td><a href="{{ route('auth.logout') }}">Logout</a></td>
        </tr>
    </table>
</body>
</html>
