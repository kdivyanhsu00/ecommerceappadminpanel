@extends('layouts.login')

@section('content')
  <div class="container-fluid pb-5 d-flex flex-column align-items-center justify-content-center">
        <h1><img src="{{ asset('img/a.png')}}" height="56px" width=" 55.4pxpx;" class="rounded" alt="logo"><img src="{{ asset('img/b.png')}}" height="34px" width="133px;" class="rounded ml-1" alt="logo"></h1>
        <div class="container row rounded border">
            <div class="col-md-6 d-flex justify-content-center align-items-center p-3">
                <img src="{{ asset('img/icon.png')}}" alt="icon" class="img-fluid p-5">
            </div>
            
            <div class="col-md-6 d-flex justify-content-around flex-column pt-5 pl-5 pr-5">
                <h6 class="mt-4">Login as a admin user</h6>

                 <form method="POST" action="{{ route('login') }}" id="forgot-password-form" class="text-left">
                  {{ csrf_field() }}
                    <div class="inputwithicon">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" validate required>
                        <i class="far fa-user"></i>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->email }}</strong>
                        </span>
                        @endif
                    </div>
    
                    <div class="inputwithicon">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" validate required>
                        <i class="fas fa-lock"></i>
                         @if($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->passsword }}</strong>
                        </span>
                        @endif
                    </div>
                    <input type="submit" value="Login" class="btn">
                </form>
                <a href="{{ route('password.request')}}" class="mb-4">Forget your Password?</a>
                <span class="mt-4 mb-2 text-center"><a href="#">Terms of use</a> | 
                    <a href="#">Privacy Policy</a></span>
            </div>
        </div>
        <div class="leftdiv"></div>
        <div class="rightdiv"></div>
    </div>
@endsection
