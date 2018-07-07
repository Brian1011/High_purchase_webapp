<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 01:36 PM
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
                <h1>Purchase Item</h1>
            </center>

                <img src="#" alt="item Image" style="width:200px; height:200px;" class="img-responsive">
                <h4>Item Name : Item </h4>
                <h4>Item Price: 40,000</h4>
                <h4>Monthly Installment: 4 months</h4>
                <h4>Installments: 10,000 /=</h4>
                <h4>Available: Available</h4>

                <form method="post" role="form" action="#">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Purchase</button>
                    </div>
                </form>

        </div>

        <div class="col-lg-4"></div>
    </div>
</div>

</body>
</html>
