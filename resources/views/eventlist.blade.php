@extends('layouts.app')

@section('content')
<?php 
	date_default_timezone_set('Asia/Calcutta'); 

	 $currentdate = date('Y-m-d H:i:s');
?>


	<div class="container">
		<div class="row row-cards row-deck" style="margin-top: 30px;">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">E-Voting</h3>
					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th class="w-1">Event Id</th>
									<th>Event</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Resolution File</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($resolution as $row)
								<?php 
									 $startdate= $row->startdate.' '.$row->start_time;
									 $enddate = $row->enddate.' '.$row->end_time;

								?>
								<tr>
									<td><span class="text-muted">{{$row->event_id}}</span></td>
									<td>{{$row->agenda}}</td>
									<td>{{$startdate}}</td>
									<td>{{$enddate}}</td>

									<td><a @if(($startdate <= $currentdate)And($enddate >= $currentdate)) href="{{url('public/images/resolution/'.$row->resolutionfile)}}" target="_blank" @else href="#" @endif> <i class="fa fa-file-pdf-o"></i> {{$row->resolutionfile}} </a></td>
									

									<td @if(($startdate <= $currentdate)And($enddate >= $currentdate)) style="color:green" @else style="color:red" @endif>

									 @if(($startdate <= $currentdate)And($enddate >= $currentdate))
									  <a href="{{url('voting/'.$row->id)}}">  {{Html::image('public/images/online.png','',array('class'=>'img-responsive','width'=>'20px'))}} Active </a>
									   @else 
									 	 {{Html::image('public/images/offline.png','',array('class'=>'img-responsive','width'=>'20px'))}} Inactive 
									  @endif

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> 
<style>
.footer{margin-top: 85px;}
.mb-md-5, .my-md-5 {
    margin-bottom: 0rem !important;
}
</style>
@endsection