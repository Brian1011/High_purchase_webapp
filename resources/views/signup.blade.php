<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 01:03 PM
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
                <h1>Signup</h1>
                <form method="post" action="/AddCustomer" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" placeholder="Name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="Email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Confirm Password" name="pass2" class="form-control" required>
                    </div>
                    <input type="hidden" name="category" value="1">
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
