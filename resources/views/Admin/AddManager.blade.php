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
    <title>Add Manager</title>
</head>
<body>
<form method="post" action="/AddManager" enctype="multipart/form-data">
    {{csrf_field()}}

    Manager Name: <input type="text" name="name" title="" value="{{$manager->name or ''}}"><br><br>
    Manager Email: <input type="text" name="email" title="" value="{{$manager->email or ''}}"><br><br>
    Manager Password: <input type="text" name="password" title="" value="{{$manager->password or ''}}"><br>
    <input type="hidden" name="category" value="{{'2'}}">
    <input type="hidden" name="id" value="{{$manager->id or ''}}">
    <button type="submit">Submit Manager</button>
</form>
</body>
</html>
