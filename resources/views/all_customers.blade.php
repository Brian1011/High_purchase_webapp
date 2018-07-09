<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/07/2018
 * Time: 11:18 PM
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

        <div class="col-lg-12">
            <h1><center>All Installments</center></h1>
            <!--Check for sucess message-->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif

            <table class="table table-hover">
                <tr class="warning">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Item price</th>
                    <th>Installment per month</th>
                    <th>Amount Paid</th>
                    <th>Balance</th>
                    <th>Months Left</th>
                    <th>Add Payment</th>
                    <th>Edit Profile</th>
                    <th>Erase record</th>
                </tr>

                <!--Loop through the data-->
                @foreach($customers as $user_installment)
                    <tr class="info">
                        <td>{{$user_installment->cust_name}}</td>
                        <td>{{$user_installment->email}}</td>
                        <td><img src="/images/{{$user_installment->item_image}}" alt="item" style="width:100px; height:100px;"></td>
                        <td>{{$user_installment->item_name}}</td>
                        <td>{{$user_installment ->total_amount}}</td>
                        <td>{{$user_installment->installment_per_month}}</td>
                        <td>{{$user_installment ->amount_paid}}</td>
                        <td>{{$user_installment ->total_amount - $user_installment ->amount_paid}}</td>
                        <td>{{ ($user_installment->total_amount - $user_installment->amount_paid) / $user_installment-> installment_per_month}}</td>
                        <td><a href="/add_payment/{{$user_installment->id}}">Add Payment</a> </td>
                        <td><a href="/Manager/Edit/{{$user_installment->user_id}}">Edit</a></td>
                        <td><a href="/delete_installment/{{$user_installment->id}}">Erase Record</a></td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>
</div>

</body>
</html>

