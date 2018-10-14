@extends('layouts.app')

@section('content')
    <section class="h-100 my-login-page">
        <div class="container h-100">
            <div class="row justify-content-md-center align-items-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                    {{Html::image('public/images/logo.jpg')}}
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Reset Password</h4>
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                             {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required autofocus>
                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="form-text text-muted">
                                        By clicking "Reset Password" we will send a password reset link
                                    </div>
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; Evoting 2018
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
