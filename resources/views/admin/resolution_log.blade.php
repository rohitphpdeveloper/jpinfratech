@extends('admin.master')


@section('content')
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Event Log</h5>
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


                      <table id="example" class="table table-hover display  pb-30" >
                        <thead>
                          <tr>
                            <th>Event Id</th>
                            <th>User</th>
                            <th>User Name</th>
                            <th>Client ip</th>
                            <th>Mac address</th>
                            <th>Browser property</th>         
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($resolution_logs as $row)
                            <tr>
                              <td>{{$row->resolution->event_id}}</td>
                              <td>{{$row->user->fd_no}}</td>
                              <td>{{$row->user->name}}</td>
                              <td>{{$row->client_ip}}</td>
                              <td>{{$row->mac_address}}</td>
                              <td>{{$row->browser_property}}</td>
                              <td>{{$row->created_at}}</td>
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

      <!-- /Footer -->
      
    </div>
    <!-- /Main Content -->
@endsection
