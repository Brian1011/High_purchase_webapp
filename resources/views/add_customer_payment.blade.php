<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/07/2018
 * Time: 11:19 PM
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

            <center><h1>Monthly Installment payment</h1></center>
            <!--Check for sucess message-->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif


            <form method="post" role="form" action="/add_payment/">
                {{csrf_field()}}
               <center><img src="/images/{{$user_installment->item_image}}" alt="item" style="width:200px; height:200px;"></center>

                <div class="form-group">
                    Installment Id:
                    <input type="text" value="{{$user_installment->id}}" class="form-control" readonly name="installment_id">
                </div>

                <div class="form-group">
                    Name:
                    <input type="text" placeholder="Name" class="form-control" required value="{{$user_installment->name}}" readonly>
                </div>

                <div class="form-group">
                    Email:
                    <input type="text" placeholder="Email" class="form-control" required value="{{$user_installment->email}}" readonly>
                </div>

                <div>
                    Item name:
                    <input type="text" class="form-control" required value="{{$user_installment->item_name}}" readonly><br>
                </div>

                <div>
                    Monthly Installment:
                    <input type="text" class="form-control" required value="{{$user_installment->installment_per_month}}" readonly name="montly_installment"><br>
                </div>

                <div class="form-group">
                    <center><button type="submit" class="btn btn-lg btn-primary">Confirm Payment</button></center>
                </div>

            </form>
        </div>

        <div class="col-lg-3"></div>
    </div>
</div>

</body>
</html>
