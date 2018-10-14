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

                             @if ($errors->has('fd_no'))
                              <p class="alert alert-danger"> {{ $errors->first('fd_no') }}</p>
                              @endif
                        
                            <form class="card" method="POST" action="{{ route('login') }}" name="loginForm" id="loginForm">

                            <div class="card-body p-6">
                             {{ csrf_field() }}
                             
                                <div class="form-group {{ $errors->has('fd_no') ? ' has-error' : '' }}">
                                    <label for="email">FD Number</label>

                                    <input id="fd_no" type="text" class="form-control" name="fd_no" value="{{ old('fd_no') }}" required autofocus>
                                 
                                </div>

                                <div class="form-group">
                                     <label for="email">Login Type</label>
                                        <div class="radio">
                                        <label><input type="radio" name="loginType" value="pwd"  checked> Password </label>
                                        </div>

                                        <div class="radio">
                                          <label><input type="radio" name="loginType"  value="otp" >OTP</label>
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password"  autocomplete="off" required autofocus>
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
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

 @section('footer_script')
<style>
.mb-md-5, .my-md-5{margin-bottom:0px !important;}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('input[name=loginType]').click(function() {
        
       var baseURI=$("meta[name=base-url]").prop('content');
       var selValue = $('input[name=loginType]:checked').val(); 

        if(selValue=='otp'){
            $("#password").prop('disabled', true);
            $('#loginForm').attr('action', baseURI+"/login_otp_send");
            $(".password").css("display", "none");
            $("#password").css("display", "none");
        }

        if(selValue=='pwd'){
            $("#password").prop('disabled', false);
            $('#loginForm').attr('action', baseURI+"/login");
            $(".password").css("display", "block");
            $("#password").css("display", "block");
        }
      
    });
});

</script>
 @endsection
