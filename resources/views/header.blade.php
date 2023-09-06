<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header page</title>
    <style>
        .nav-link , .navbar-brand{
            color: #fff;
        }
        #home{
            color: #fff;
        }
        .navbar-expand-lg .navbar-nav .nav-link{
          color: #fff
        }
        .navbar-expand-lg .navbar-nav .nav-link:hover{
          color: #fff;
        }
        #cont-one{
          padding: 0px 34px;
        }
    </style>
</head>
<body>
  <?php
  use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total= ProductController::cartItem();
}

?>
    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid" id="cont-one">
          <a class="navbar-brand" href="/">Ecomm</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" id="home" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/myorders">Orders</a>
              </li>
              
              
            </ul>
            <form class="d-flex" action="/search" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/cartlist">Cart({{$total}})</a>
            </li>
            @if(Session::has('user'))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Session::get('user')['name']}}
              </a>
              <ul class="dropdown-menu" style="color:#fff;">
                <li><a class="dropdown-item" href="/logout">logout</a></li>
              </ul>
            </li>
            @else
            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
            @endif
            </ul>
          </div>
        </div>
      </nav>
</body>
</html>