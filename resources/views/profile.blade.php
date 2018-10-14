@extends('layouts.app')

@section('content')
<div class="container">
					<div class="row">
						<div class="card-body text-center">
							<p class="mb-4 text-white">User Profile</p>
						</div>
					</div>
                   <div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div id="profile-log-switch">
									<div class="fade show active ">
										<div class="table-responsive border ">
											<table class="table row table-borderless w-100 m-0 ">
												@if($user->user_type==1)
												<tbody class="col-lg-4 p-0">
													<tr>
														<td><strong>Fd No :</strong> {{ $user->fd_no}}</td>
													</tr>
													<tr>
														<td><strong>Voting Share :</strong> {{ $user->voting_share}}</td>
													</tr>
													<tr>
														<td><strong>Name :</strong> {{ $user->name}}</a></td>
													</tr>
													<tr>
														<td><strong>E-Mail ID :</strong> {{ $user->email}}</td>
													</tr>
													<tr>
														<td><strong>Mobile Number :</strong> {{ $user->mobile}}</td>
													</tr>
													<tr>
														<td><strong>E-Mail ID 2 :</strong> {{ $user->email2}}</td>
													</tr>
												</tbody>
												<tbody class="col-lg-4 p-0">
													
													<tr>
														<td><strong>Prn Amt :</strong> {{ $user->prn_amt}}</td>
													</tr>
													<tr>
														<td><strong>Int_amt :</strong> {{ $user->int_amt}}</td>
													</tr>
													
													<tr>
														<td><strong>Mat_date :</strong> {{ $user->mat_date}}</td>
													</tr>
													<tr>
														<td><strong>Pan Number :</strong> {{ $user->pan}}</td>
													</tr>
													<tr>
														<td><strong>Pin Code :</strong> {{ $user->pin}}</td>
													</tr>
												</tbody>

												<tbody class="col-lg-4 p-0">
													
													<tr>
														<td><strong>Address 1 :</strong> {{ $user->adr1}}</td>
													</tr>
													<tr>
														<td><strong>Address 2 :</strong> {{ $user->adr2}}</td>
													</tr>
													<tr>
														<td><strong>Address 3 :</strong> {{ $user->adr3}}</td>
													</tr>
													<tr>
														<td><strong>Address 4 :</strong> {{ $user->adr4}}</td>
													</tr>
													<tr>
														<td><strong>Roi :</strong> {{ $user->roi}}</td>
													</tr>
													
												</tbody>
												@endif
													<!-- Home buyer -->
												@if($user->user_type==2)
												<tbody class="col-lg-6 p-0">
													<tr>
														<td><strong>Unit No :</strong> {{ $user->fd_no}}</td>
													</tr>
													<tr>
														<td><strong>Voting Share :</strong> {{ $user->voting_share}}</td>
													</tr>
													<tr>
														<td><strong>Name :</strong> {{ $user->name}}</a></td>
													</tr>
													<tr>
														<td><strong>E-Mail ID :</strong> {{ $user->email}}</td>
													</tr>
													<tr>
														<td><strong>Mobile Number :</strong> {{ $user->mobile}}</td>
													</tr>
												</tbody>
												<tbody class="col-lg-6 p-0">
													<tr>
														<td><strong>Sale order :</strong> {{ $user->sale_order}}</td>
													</tr>
													<tr>
														<td><strong>Customer :</strong> {{ $user->customer}}</td>
													</tr>
													<tr>
														<td><strong>Collection :</strong> {{ $user->collection}}</td>
													</tr>
													<tr>
														<td><strong>Interest :</strong> {{ $user->interest}}</td>
													</tr>
													<tr>
														<td><strong>Total :</strong> {{ $user->total}}</td>
													</tr>
												</tbody>	
												@endif
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									
									
									<a href="{{url('/change_password')}}"><button class="btn btn-primary" type="button">
										<i class="fa fa-pencil"></i> change password
									</button>
									</a>
								
									
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
                </div> 
<style>
.footer{margin-top: 85px;}
.mb-md-5, .my-md-5 {
    margin-bottom: 0rem !important;
}
</style>

@endsection