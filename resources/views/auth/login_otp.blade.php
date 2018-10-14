@extends('layouts.app')

@section('content')
<div class="page">
    <div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <img src="assets/images/brand/logo.png" class="h-6" alt="">
                    </div>
                    
                            @if(Session::has('message'))
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                            @endif

                            @foreach (['danger', 'warning', 'success', 'info'] as $key)
                             @if(Session::has($key))
                                 <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                             @endif
                            @endforeach

                   
                                @if (count($errors) > 0)
                                 <div class = "alert alert-danger">
                                    <ul>
                                       @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                       @endforeach
                                    </ul>
                                 </div>
                              @endif

                            <form class="card" method="POST" url="login_otp" name="loginForm" id="loginForm">

                            <div class="card-body p-6">
                             {{ csrf_field() }}
                             
                                <div class="form-group {{ $errors->has('otp') ? ' has-error' : '' }}">
                                    <label for="email">OTP</label>
                                    <input id="otp" type="text" class="form-control" name="otp" value="{{ old('otp') }}" required autofocus>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">New Password</label>
                                    <input  type="password" class="form-control" name="password"  autocomplete="off" required autofocus>
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password">Confirm password</label>
                                    <input  type="password" class="form-control" name="password_confirmation"  autocomplete="off" required autofocus>
                                     @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        update password
                                    </button>
                                </div>
                             </div>
                            </form>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection

