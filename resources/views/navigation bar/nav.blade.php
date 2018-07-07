<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 12:07 PM
 */
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>

        <ul class="nav navbar-nav">
            <!--if you are logged in as customer you will see purchases-->
                <li><a href="/fees">Purchases</a></li>

            <!--if you are logged in as manager or as admin you will see items link-->
                 <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="{{'/Item'}}">Items
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{url('/ItemForm')}}">Add items</a> </li>
                     </ul>
                 </li>

            <!--if you are logged in as admin you will see manager links-->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{'/Managers'}}">Manager
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{'/ManagerForm'}}">Add Manager</a> </li>
                </ul>
            </li>

        </ul>


       <!--Appears at the rigt handside of the navigation bar-->
        <ul class="nav navbar-nav navbar-right">
            <!--if user is not logged show login and signup form-->
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

            <!--if you are logged in irregardless of category you will see profile and logout-->
            <li><a href="/student">Profile</a></li>
            <li><a href="/all_students">Logout</a></li>
            <!--
            <form method="get" action="/student/search_student" class="form-inline">
            {{csrf_field()}}
                <input type="text" placeholder="Username" name="" class="form-control" required>
                <input type="text" placeholder="Password" name="" class="form-control" required>
                <input type="submit" value="Login" class="btn btn-primary">
            </form>
            -->
        </ul>
    </div>
</nav>

</body>
</html>

