

@extends('layouts.master')
@section('title','Login')

@section('content')
<style>
    body {
      margin: 0;
      padding: 0;
      background-color: #343a40;
      height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
      margin-top: 120px;
      max-width: 600px;
      height: 340px;
      border: 1px solid #9C9C9C;
      background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
      padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
      margin-top: -85px;
    }
    </style>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        @if (Session::has('success'))
                         <div class=" text-center text-success">{{Session::get('success')}}</div>
                        @endif
                        <form id="login-form" class="form" action="checklogin" method="POST">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                                <a href="/" class="mx-3">If You Don't Have Account Pleas Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection