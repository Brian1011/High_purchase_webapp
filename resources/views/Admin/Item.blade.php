<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 07/07/2018
 * Time: 12:00
 */
?>
<html>
<head>
    <title>Items</title>

</head>
<body>
<!--the navigation bar-->
@include('navigation bar/nav')
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <h1><center>All Items</center></h1>
            <table class="table table-hover">
                <tr>
                    <th>Item Image </th>
                    <th> Item Name</th>
                    <th> Item Price</th>
                    <th> Item Months</th>
                    <th>Item Installement Price </th>
                    <th> Item Quantity</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td><img src="/images/{{$item->item_image}}" style="height: 100px; width: 100px;"></td>
                        <td>{{$item->item_name}}</td>
                        <td>{{$item->item_price}}</td>
                        <td>{{$item->months}}</td>
                        <td>{{$item->installment_per_month}}</td>
                        <td>{{$item->quantity}}</td>
                        <td><a href="/Item/Edit/{{$item->id}}">Edit</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
