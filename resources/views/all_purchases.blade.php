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
                    @foreach($user_installment as $user_installment)
                        <tr class="info">
                            <td><img src="/images/{{$user_installment->item_image}}" alt="item" style="width:100px; height:100px;"></td>
                            <td>{{$user_installment->item_name}}</td>
                            <td>{{$user_installment ->total_amount}}</td>
                            <td>{{$user_installment->installment_per_month}}</td>
                            <td>{{$user_installment ->amount_paid}}</td>
                            <td>{{$user_installment ->total_amount - $user_installment ->amount_paid}}</td>
                            <td>{{ ($user_installment->total_amount - $user_installment->amount_paid) / $user_installment-> installment_per_month}}</td>
                        </tr>
                    @endforeach

                </table>
        </div>

        <div class="col-lg-3"></div>
    </div>
</div>

</body>
</html>
