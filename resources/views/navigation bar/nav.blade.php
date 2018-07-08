<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 12:07 PM
 */
use Illuminate\Http\Request;

?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">

    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>

        <ul class="nav navbar-nav">
            <!--if you are logged in as customer you will see purchases-->
            @if(session("user_category")=="1")
                <li><a href="/all_purchases">My Purchases</a></li>
            @endif

            <!--check if session exists-->
            @if(session()->exists('user_email'))
                <!--You are logged in-->

                <!--if you are logged in as manager or as admin you will see items link-->
                    @if(session("user_category")=="2" || session("user_category")=="3")
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{'/Item'}}">All items</a> </li>
                                <li><a href="{{url('/ItemForm')}}">Add items</a> </li>
                            </ul>
                        </li>

                        <li><a href="{{'/all_customers'}}">All Purchases</a></li>
                    @endif

                <!--if you are logged in as admin you will see manager links-->
                    @if(session("user_category")=="3")
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manager
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{'/Managers'}}">All Managers</a> </li>
                                <li><a href="{{'/ManagerForm'}}">Add Manager</a> </li>
                            </ul>
                        </li>
                    @endif
        </ul>

                <!--Appears at the rigt handside of the navigation bar-->
                <ul class="nav navbar-nav navbar-right">
                    <!--if you are logged in irregardless of category you will see profile and logout-->
                    <li><a href="/profile">Profile</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            @else
                <!--You are not logged in-->
                    <ul class="nav navbar-nav navbar-right">
                    <!--if user is not logged show login and signup form-->
                    <li><a href="/login"> Login</a></li>
                    <li><a href="/signup">Sign Up</a></li>
                </ul>
            @endif



    </div>
</nav>

</body>
</html>

