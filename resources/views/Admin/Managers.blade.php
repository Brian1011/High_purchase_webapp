<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 07/07/2018
 * Time: 12:17
 */
?>
<html>
<head>
    <title>Managers</title>
</head>
<body>
<table border="1">
    <tr>
        <th>Manager Name</th>
        <th>Manager Email </th>
        <th>Manager Password</th>
    </tr>
    @foreach($manager as $managers)
        <tr>
            <td>{{$managers->name}}</td>
            <td>{{$managers->email}}</td>
            <td>{{$managers->password}}</td>
            <td><a href="/Manager/Edit/{{$managers->id}}">Edit</a></td>
        </tr>
    @endforeach
</table>
</body>
</html>
