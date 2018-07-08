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
<!--the navigation bar-->
@include('navigation bar/nav')

<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <form method="post" action="/Item" enctype="multipart/form-data">

                <!--Check if there are errors-->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <!--if errors exist print all of them-->
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <!--Check for sucess message-->
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                {{csrf_field()}}
                <img src="/images/{{$items->item_image or ''}}" style="height: 100px; width: 100px;"><br>
                Item Image: <br>
                <div class="form-group">
                    <input type="file" name="item_image" value="{{$items->item_image or ''}}">
                </div>
                Item Name: <input type="text" name="item_name" title="" value="{{$items->item_name or ''}}" class="form-control"><br>
                Item Price: <input type="text" name="item_price" title="" value="{{$items->item_price or ''}}" class="form-control"><br>
                Item Months: <input type="text" name="months" title="" value="{{$items->months or ''}}" class="form-control"><br>
                Item Installement: <input type="text" name="installement" title="" value="{{$items->installment_per_month or ''}}" class="form-control"><br>
                Item Quantity: <input type="text" name="quantity" title="" value="{{$items->quantity or ''}}" class="form-control"><br>
                <input type="hidden" name="id" value="{{$items->id or ''}}">
                <input type="hidden" name="old_item_image" value="{{$items->item_image or ''}}">
                <button type="submit" class="btn btn-primary">Submit Item</button>
            </form>
        </div>

    </div>
</div>
</body>
</html>