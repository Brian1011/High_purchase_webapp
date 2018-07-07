<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 07/07/2018
 * Time: 12:13 PM
 */
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style type="text/css">
            form{

            }
            .card a{
                text-decoration:none;
                color:black;
            }
            .card a:hover{
                text-decoration:none;
                color:black;
            }
            .card{
                display:inline-block;
                margin-left:5px;
                margin-bottom:5px;
                margin-top:5px;
                border:1px solid #ccc;
            }
            .card:hover{
                border: 1px solid black;
            }
            .card img{
                /*transition: all 1s ease;*/
            }
            .card img:hover{
                /*transform:scale(1.25);*/
            }
        </style>

        <style type="text/css">
            html, body {
                height: 100%;
            }
            body {
                display: flex;
                flex-direction: column;
            }
            .content {
                flex: 1 0 auto;
            }
        </style>
    </head>

    <body>
        <!--the navigation bar-->
        @include('navigation bar/nav')
        <div class="content">
            <div class="container">
                <h1><center>Shop Online</center></h1>

                <div class="card" style="width: 20rem; ">
                    <a href="/purchase">
                        <img src="images.jpg" alt="item Image" style="width:200px; height:200px;" class="img-responsive">

                        <div class="card-block">
                            <h4>Item name: Item</h4>
                            <h4>Price: 40,000</h4>
                        </div>
                    </a>
                </div>

                <div class="card" style="width: 20rem; ">
                    <a href="/purchase">
                        <img src="images.jpg" alt="item Image" style="width:200px; height:200px;" class="img-responsive">

                        <div class="card-block">
                            <h4>Item name: Item</h4>
                            <h4>Price: 40,000</h4>
                        </div>
                    </a>
                </div>

                <div class="card" style="width: 20rem; ">
                    <a href="/purchase">
                        <img src="images.jpg" alt="item Image" style="width:200px; height:200px;" class="img-responsive">

                        <div class="card-block">
                            <h4>Item name: Item</h4>
                            <h4>Price: 40,000</h4>
                        </div>
                    </a>
                </div>

                <div class="card" style="width: 20rem; ">
                    <a href="/purchase">
                        <img src="images.jpg" alt="item Image" style="width:200px; height:200px;" class="img-responsive">

                        <div class="card-block">
                            <h4>Item name: Item</h4>
                            <h4>Price: 40,000</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </body>
</html>
