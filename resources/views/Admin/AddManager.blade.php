<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 07/07/2018
 * Time: 12:17
 */
?>
<html>
<head>
    <title>Add Manager</title>
</head>
<body>
<!--the navigation bar-->
@include('navigation bar/nav')
<div class="container">
    <!--If user is customer display different form-->
    @if($manager->category == '1')
        <h1><center>Change Customer Profile</center></h1>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
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


                <form method="post" action="/AddManager" enctype="multipart/form-data">
                    {{csrf_field()}}

                    Customer Name: <input type="text" name="name" title="" value="{{$manager->name or ''}}" class="form-control"><br>
                    Customer Email: <input type="text" name="email" title="" value="{{$manager->email or ''}}" class="form-control"><br>
                    Customer Password: <input type="password" name="password" title="" value="{{$manager->password or ''}}" class="form-control"><br>
                    Confirm Password: <input type="password" name="password_confirmation" title="" value="{{$manager->password or ''}}" class="form-control"><br>
                    <input type="hidden" name="category" value="{{'2'}}">
                    <input type="hidden" name="id" value="{{$manager->id or ''}}">
                    <button type="submit" class="btn btn-primary">Submit Customer Changes</button>
                </form>
            </div>
        </div>

    @else
        <h1><center>Add Manager</center></h1>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
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


                <form method="post" action="/AddManager" enctype="multipart/form-data">
                    {{csrf_field()}}

                    Manager Name: <input type="text" name="name" title="" value="{{$manager->name or ''}}" class="form-control"><br>
                    Manager Email: <input type="text" name="email" title="" value="{{$manager->email or ''}}" class="form-control"><br>
                    Manager Password: <input type="password" name="password" title="" value="{{$manager->password or ''}}" class="form-control"><br>
                    Confirm Password: <input type="password" name="password_confirmation" title="" value="{{$manager->password or ''}}" class="form-control"><br>
                    <input type="hidden" name="category" value="{{'2'}}">
                    <input type="hidden" name="id" value="{{$manager->id or ''}}">
                    <button type="submit" class="btn btn-primary">Submit Manager</button>
                </form>
            </div>
        </div>
    @endif
</div>
</body>
</html>
