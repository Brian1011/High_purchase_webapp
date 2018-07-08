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
        <div class="col-lg-2"></div>

        <div class="col-lg-8">
            <center>
                <h1>Purchase Item</h1>
            </center>

            <!--Check for sucess message-->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <img src="/images/{{$items->item_image}}" alt="item Image" style="width:200px; height:200px;" class="img-responsive">
                </div>

                <div class="col-lg-6">
                    <h4>Item Id: {{$items->id}}</h4>
                    <h4>Item Name : {{$items->item_name}} </h4>
                    <h4>Item Price: {{$items->item_price}}</h4>
                    <h4>Monthly Installment: {{$items->months}} Months</h4>
                    <h4>Installments: {{$items->installment_per_month}} /=</h4>
                    <h4>Available: {{$items->quantity}}</h4>

                    <!--You can only purchase if you are the customer-->
                    @if(session('user_category')== '1')

                        <!--But if the quantity is 0 you cant buy-->
                        @if($items->quantity > 0)
                            <form method="post" role="form" action="/installement">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" value="{{$items->id}}" name="item_id">
                                    <input type="hidden" value="{{$items->item_price}}" name="total_amount">
                                    <input type="hidden" value="{{session('user_id')}}" name="user_id">
                                    <button type="submit" class="btn btn-lg btn-primary">Purchase</button>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h4>Sorry, This Item is out of stock</h4>
                            </div>
                        @endif
                    @endif

                    <!--If admin / manager you can edit item-->
                    @if( session('user_category')== '2' || session('user_category')== '3' )
                        <a href="/Item/Edit/{{$items->id}}"><button class="btn btn-lg btn-primary">Edit Item</button></a>
                    @endif

                    <!--If user is not logged in show this-->
                    @if(session('user_id')==null)
                        <div class="alert alert-danger">
                           <h3> To purchase this item <b><a href="/signup">Sign Up</a></b> or <b><a href="/login"> Login</a></b> now</h3>
                        </div>
                    @endif
                </div>
            </div>


        </div>

        <div class="col-lg-2"></div>
    </div>
</div>

</body>
</html>
