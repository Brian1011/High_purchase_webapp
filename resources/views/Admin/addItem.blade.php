<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 07/07/2018
 * Time: 11:50
 */
?>

<html>
<head>
    <title>Add Items</title>
</head>
<body>
<form method="post" action="/Item" enctype="multipart/form-data">
    {{csrf_field()}}

    Item Name: <input type="text" name="item_name" title="" value="{{$items->item_name or ''}}"><br><br>
    Item Image: <input type="text" name="item_image" title="" value="{{$items->item_image or ''}}"><br><br>
    Item Price: <input type="text" name="item_price" title="" value="{{$items->item_price or ''}}"><br>
    Item Months: <input type="text" name="months" title="" value="{{$items->months or ''}}"><br><br>
    Item Installement: <input type="text" name="installement" title="" value="{{$items->installment_per_month or ''}}"><br><br>
    Item Quantity: <input type="text" name="quantity" title="" value="{{$items->quantity or ''}}"><br>
    <input type="hidden" name="id" value="{{$items->id or ''}}">
    <button type="submit">Submit Item</button>
</form>
</body>
</html>