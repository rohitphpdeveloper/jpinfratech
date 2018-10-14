@extends('layouts.app')

@section('content')
<?php $currentdate = date('Y-m-d');?>
	 <div class="container">
                   <div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div id="profile-log-switch">
									<div class="fade show active ">
										<div class="table-responsive border ">
											<table class="table row table-borderless w-100 m-0 ">
												<tbody class="col-lg-12 p-0">
													<tr>
														<td><strong>Event : </strong>{{$resolution->agenda}}</td>
													</tr>
												</tbody>
												<tbody class="col-lg-6 p-0">
													<tr>
														<td><strong>EVENT ID:</strong> {{$resolution->event_id}}</td>
													</tr>
													<tr>
														<td><strong>Resolution File :</strong> <a href="{{url('public/images/resolution/'.$resolution->resolutionfile)}}" target="_blank"> <i class="fa fa-file-pdf-o"></i> Download FIle </a></td>
													</tr>
												</tbody>
												<tbody class="col-lg-6 p-0">
													<tr>
														<td><strong>Start Date / Time:</strong> {{$resolution->startdate}} {{$resolution->start_time}}</td>
													</tr>
													<tr>
														<td><strong>Voting End Date / Time:</strong> {{$resolution->enddate}} {{$resolution->end_time}}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> 
					<div class="col-12">
						<div class="card">
							{!! Form::open(array('url' => 'thankyou','method' => 'POST','class' => 'needs-validation','files' => true)) !!}
							<input type="hidden" name="resolution_id" value="{{$resolution->id}}">
							<div class="card-body">
								<div class="fluid-container">
									<?php  $i=0;?>
									@foreach($vote as $row)
									<input type="hidden" name="question_id[]" value="{{$row->id}}">
									<h3 class="card-title">Resolution : {{$row->resolution_text}}</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-3">
													<p>Resolution Description:</p>
												</div>
												<div class="col-md-9">
													<div id="overflowTest">{{$row->resolution_description}}</div>										
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<table class="table row table-borderless w-100 m-0 ">

												<tbody style="width: 100%;padding-left: 120px;">
													<tr>
														<td><input type="radio" name="answer[{{$i}}]" value="1"> {{$row->option_1}}</td>
													</tr>
													<tr>
														<td><input type="radio" name="answer[{{$i}}]" value="2"> {{$row->option_2}}</td>
													</tr>
													<tr>
														<td><input type="radio" name="answer[{{$i}}]" value="3" required> {{$row->option_3}}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<?php ++$i ?>
									@endforeach

								</div>
								<div class="row">
									<div class="col-md-6">
									</div>
									<div class="col-md-6" style="margin-left: 62%">
									 <button type="submit" class="btn btn-primary" style="">submit</button>
									<div>
								</div>
							</div>
							  {!! Form::close() !!}
						</div>
					</div>
                </div> 
                <style>
#overflowTest {
background: #fff;
color: #000;
padding: 15px;
width: 100%;
height: 150px;
overflow-y: scroll;
border: 1px solid #ccc;
}
.card-body .card-title {
   padding-top: 10px;
}
.text-white{color: #0062ab !important;
outline: 2px solid aliceblue;
padding: 8px;}
</style>
             
@endsection