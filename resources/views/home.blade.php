@extends('layouts.app')

@section('content')
<div class="container" style="padding: 0px 0px 180px;">
					<div class="row">
						<div class="card-body text-center">
							<p class="mb-4 text-white"></p>
						</div>
					</div>
                    <div class="row row-cards">
                        <div class="col-lg-4 col-md-12 m-b-3">
                            <div class="widget-info card bg-teal">
								<a href="{{url('eventlist')}}">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-6 col-6 text-white">
												<h2 class="font-weight-bold">E-Voting</h2> </div>
											<div class="col-sm-6 col-6 m-t-2 text-right"> <i class="fa fa-send-o fa-3x text-white"></i> </div>
										</div>
									</div>
								</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 m-b-3">
                            <div class="widget-info card bg-orange">
								<a href="{{url('profile')}}">
									<div class="card-body">
										<div class="row">
											<div class="col-6 text-white">
												<h2 class="font-weight-bold">User Profile</h2></div>
											<div class="col-6 m-t-2 text-right"> <i class="fa fa-user-o fa-3x text-white"></i> </div>
										</div>
									</div>
								</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 m-b-3">
                            <div class="widget-info card bg-teal">
								<a href="{{url('enquiry')}}">
									<div class="card-body">
										<div class="row">
											<div class="col-6 text-white">
												<h2 class="font-weight-bold">Enquiry
												</h2> </div>
											<div class="col-6 m-t-2 text-right"><i class="fa fa-newspaper-o fa-3x text-white"></i></div>
										</div>
									</div>
								</a>
                            </div>
                        </div>
                    </div>
                </div>
<style>
.mb-md-5, .my-md-5 {
    margin-bottom: 0px !important;
}
</style>

@endsection
