<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 12:38 PM
 */
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
<!--the navigation bar-->
@include('navigation bar/nav')

<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>

        <div class="col-lg-4">
            <center>
                <h1>Login</h1>
                <form method="post" role="form" action="#">
                    <div class="form-group">
                        <input type="text" placeholder="Email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control" required><br>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </center>
        </div>

        <div class="col-lg-4"></div>
    </div>
</div>

</body>
</html>
