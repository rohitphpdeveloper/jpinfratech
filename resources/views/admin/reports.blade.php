@extends('admin.master')
@section('content')
<?php 
  date_default_timezone_set('Asia/Calcutta'); 

   $currentdate = date('Y-m-d H:i:s');
?>
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Report List</h5>
          </div>
        </div>
        <!-- /Title -->
        
        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
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

                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> {{ session()->get('success') }}</strong> 
                          </div>
                         @endif


                      <table id="" class="table table-hover display pb-30" >
                        <thead>
                          <tr>
                            <th>Event Id</th>
                            <th style="width: 220px;">Event</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>Resolution File</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($resolutions as $row)
                         <?php 
                             $startdate= $row->startdate.' '.$row->start_time;
                             $enddate = $row->enddate.' '.$row->end_time;

                          ?>
                            <tr>
                                <td>{{$row->event_id}}</td>
                                <td>{{$row->agenda}} </td>
                                <td>{{$row->startdate}} </td>
                                <td>{{$row->start_time}} </td>
                                <td>{{$row->enddate}} </td>
                                 <td>{{$row->end_time}} </td>
                                <td>{{$row->resolutionfile}}</td>
                                <td>
                                   @if(($startdate <= $currentdate)And($enddate >= $currentdate))
                                     Active
                                   @else 
                                    Inactive 
                                   @endif
                                  </td>
                                <td>
                                 
                                  @if(($startdate <= $currentdate)And($enddate >= $currentdate))
                                     
                                   @elseif(Auth::guard('admin')->user()->admin_type!=0) 
                                     @if($row->finalize==1)
                                      Finalized
                                       <a  class="btn btn-primary btn-xs" href="{{ url("admin/report/$row->id") }}">Download</a>
                                       
                                     @else
                                       <button class="btn btn-success btn-xs" onclick="finalizeEvent({{$row->id}})">Finalize </button>
                                    @endif
                                   
                                   @endif

                                   @if(($startdate <= $currentdate)And($enddate >= $currentdate))
                                     
                                   @elseif(Auth::guard('admin')->user()->admin_type==0) 
                                     @if($row->finalize==1)
                                      Finalized
                                       <a  class="btn btn-primary btn-xs" href="{{ url("admin/report/$row->id") }}">Download</a>
                                      @endif
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
          </div>
        </div>
        <!-- /Row -->
      </div>
      
      <!-- Footer -->
      <script>
         function finalizeEvent(id){

              if(confirm("Are you sure?"))
              {

                $.ajax({
                type:"POST",
                url:"{{url('admin/resolution/finalize')}}",
                beforeSend: function(xhr){

                xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},

                cache: false,

                async:false,

                data:{'id':id},

                success:function(data){
                 location.reload();

                }

                })

              }

            }

            window.setTimeout(function() {
              $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 2000);
            

             function deleteItam(id){

              if(confirm("Are you sure?"))
              {

                $.ajax({

                url:'resolution/'+id,

                type:'delete',

                beforeSend: function(xhr){

                xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},

                cache: false,

                async:false,

                data:{'id':id},

                success:function(data){

                 location.reload();

                }

                })

              }

            }

            window.setTimeout(function() {
              $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 2000);
      </script>
      <!-- /Footer -->
      
    </div>
    <!-- /Main Content -->
@endsection
