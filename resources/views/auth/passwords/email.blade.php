@extends('layouts.login')
@section('content')
<div class="container-fluid pb-5 d-flex flex-column align-items-center justify-content-center">
        <h1><img src="{{ asset('img/a.png')}}" height="40px" width=" 55.4pxpx;" class="rounded" alt="logo"><img src="{{ asset('img/b.png')}}" height="30px" width="133px;" class="rounded ml-1" alt="logo"></h1>
        <div class="container row rounded border">
            <div class="col-md-6 d-flex justify-content-center align-items-center p-3">
                <img src="{{ asset('img/f-icon.png')}}" alt="icon" class="img-fluid p-5">
            </div>
            
            
            <div class="col-md-6 d-flex justify-content-around flex-column pt-5 pl-5 pr-5">
                <h6 class="mt-4">Forgot Password</h6>
                <p style="font-size:11px;">Please Enter here your registered Email Id. We will 
send a reset password link via mail.</p>
                <form id="forgot-password-form" class="text-left" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                <div class="inputwithicon">

             @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

                        <input id="email" type="email" placeholder="Enter your registered Email" class="form-control" name="email" value="{{ old('email') }}" validate required><i class="far fa-user"></i>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    </div>
    <br>
                  
                    <input type="submit" value="submit" class="btn btn-login ">
                </form>
                <a href="{{ route('login')}}" class="mb-4">Login my Account</a>
                <span class="mt-4 mb-2 text-center"><a href="#">Terms of use</a> | 
                    <a href="#">Privacy Policy</a></span>
                    
            </div>
        </div>
        <div class="leftdiv"></div>
        <div class="rightdiv"></div>
    </div>

    @endsection