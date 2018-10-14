@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="card-body text-center">
				<p class="mb-4 text-white">User Profile</p>
			</div>
		</div>
  
			@if(Session::has('message'))
			<p class="alert alert-danger">{{ Session::get('message') }}</p>
			@endif

			@if (count($errors) > 0)
			 <div class = "alert alert-danger">
			    <ul>
			       @foreach ($errors->all() as $error)
			          <li>{{ $error }}</li>
			       @endforeach
			    </ul>
			 </div>
			 @endif
  		{!! Form::open(array('url' =>'change_password_submit','method' => 'post','class' => 'form-horizontal form-label-left')) !!}
		
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="input-group">
							<input class="form-control" placeholder="Enter Otp.." type="text" name="otp" required>
							<span class="input-group-append">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-pencil"></i> Update
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
	</form>


    </div> 

@endsection