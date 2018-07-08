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

<!--the navigation bar-->
@include('navigation bar/nav')
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h1><center>All Managers</center></h1>

        <table class="table">
            <tr class="danger">
                <th>Manager Name</th>
                <th>Manager Email </th>
                <th>Manager Password</th>
                <th>Edit</th>
            </tr>
            @foreach($manager as $managers)
                <tr class="info">
                    <td>{{$managers->name}}</td>
                    <td>{{$managers->email}}</td>
                    <td>{{$managers->password}}</td>
                    <td><a href="/Manager/Edit/{{$managers->id}}">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
        <div class="col-lg-2"></div>
</div>
</div>
</body>
</html>
