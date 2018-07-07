<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 02:26 PM
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
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
                <h1><center>All My Purchase</center></h1>
                <table class="table table-hover">
                    <tr class="warning">
                        <th>Image</th>
                        <th>Item name</th>
                        <th>Item price</th>
                        <th>Installment per month</th>
                        <th>Amount Paid</th>
                        <th>Balance</th>
                        <th>Months Left</th>
                    </tr>

                    <!--Loop through the data-->
                    <tr class="info">
                        <td><img src="images.jpg" alt="item" style="width:100px; height:100px;"></td>
                        <td>Fridge</td>
                        <td>70,000</td>
                        <td>10,000</td>
                        <td>40,000</td>
                        <td>30,000</td>
                        <td>3</td>
                    </tr>

                    <tr class="info">
                        <td><img src="images.jpg" alt="item" style="width:100px; height:100px;"></td>
                        <td>Fridge</td>
                        <td>70,000</td>
                        <td>10,000</td>
                        <td>40,000</td>
                        <td>30,000</td>
                        <td>3</td>
                    </tr>
                </table>
        </div>

        <div class="col-lg-3"></div>
    </div>
</div>

</body>
</html>
