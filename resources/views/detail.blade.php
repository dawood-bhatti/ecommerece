<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <style>
 .ancr {
    text-decoration: none;
    color: #fff;
    border: 1px solid #c1aeae;
    font-size: 27px;
    border-radius: 12px;
    background: #77a7ff;
    padding: 4px 20px;
}
    </style>
</head>
<body>
    @extends('master')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
        <img src="{{$products['gallery']}}" class="img-fluid"  alt="">
            </div>
            <div class="col-sm-6">
                <h2>{{$products['name']}}</h2>
                <h3>Price: {{$products['price']}}</h3>
                <p>Detail:{{$products['description']}}</p>
                <p>Category:{{$products['category']}}</p>
                <br><br>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden"  name="product_id" value="{{$products['id']}}">
                    <button class="btn btn-primary my-3">Add to cart</button>
                </form>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-success my-3 ">Buy now</button>
                    </div>
                    
                    <div class="col-md-6 my-4">
                        <a href="/" class="ancr">Go Back</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    @endsection

</body>
</html>