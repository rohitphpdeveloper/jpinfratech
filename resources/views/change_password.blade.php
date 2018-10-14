@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="card-body text-center">
				<p class="mb-4 text-white">Change password</p>
			</div>
		</div>

			@if(Session::has('message'))
			<p class="alert alert-danger">{{ Session::get('message') }}</p>
			@endif


			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			
  		{!! Form::open(array('url' =>'change_password_otp','method' => 'POST','class' => 'form-horizontal form-label-left')) !!}
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="form-group">
				
        <div class="control-group">
            <label for="new_password" class="control-label">New Password</label>
            <div class="controls">
                <input type="password" name="password" required>
            </div>
        </div>
      
        <div class="control-group">
            <label for="confirm_password" class="control-label">Confirm Password</label>
            <div class="controls">
                <input type="password" name="password_confirmation" required>
            </div>
        </div> 

        <div class="control-group">
        	<button class="submit">change password </button>
		</div>	
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</form>


    </div> 
<style type="text/css">
.mb-md-5, .my-md-5 {margin-bottom: 0rem !important;}
.footer{margin-top: 185px;}
.my-3.my-md-5 input {
    border: 1px solid #dddddd;
    height: 38px;
    border-radius: 0;
    width: 100%;
    padding: 6px 15px;
}
.my-3.my-md-5 button {
    background: rgb(236, 124, 42);
    border: none;
    color: #fff;
    padding: 10px;
    margin-top: 15px;
    text-transform: uppercase;
}
.my-3.my-md-5 button:hover {
    background: rgb(5, 98, 171);
    }
</style>


@endsection