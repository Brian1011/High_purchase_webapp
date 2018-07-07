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
<table border="1">
    <tr>
        <th> Item Name</th>
        <th>Item Image </th>
        <th> Item Price</th>
        <th> Item Months</th>
        <th>Item Installement Price </th>
        <th> Item Quantity</th>
    </tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->item_name}}</td>
            <td>{{$item->item_image}}</td>
            <td>{{$item->item_price}}</td>
            <td>{{$item->months}}</td>
            <td>{{$item->installment_per_month}}</td>
            <td>{{$item->quantity}}</td>
            <td><a href="/Item/View/{{$item->id}}">Edit</a></td>
        </tr>
    @endforeach
</table>
</body>
</html>
