@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="card-body text-center">
			<p class="mb-4 text-white"></p>
		</div>
	</div>
   <div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div id="profile-log-switch">
					 @if (count($errors) > 0)
                       <div class="alert alert-danger">
                              <ul class='text'>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                                               
                    @if(session()->has('success'))
					<div class="alert alert-success fade show active thankupage">
						<h4>{{ session()->get('success') }}</h4>
					</div>
					@endif

				</div>
			</div>
		</div>
	</div>
</div> 


@endsection