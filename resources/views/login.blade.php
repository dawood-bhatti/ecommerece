@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-md-5 offset-4">
            <form action="login" method="POST">
                <div class="form-group">
                    @csrf
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
               
                <button type="submit" class="btn btn-primary my-2">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection