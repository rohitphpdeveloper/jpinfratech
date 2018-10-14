@extends('admin.master')


@section('content')
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">News List</h5>
          </div>
          <!-- Breadcrumb -->
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 resolutionbtn">
            <a href="{{url('admin/blog/create')}}" class="btn btn-success btn-anim btn-sm addbtn"><i class="icon-rocket"></i><span class="btn-text">Create News</span></a>
          </div>
          <!-- /Breadcrumb -->
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
                                <th>Name</th>
                                <th>Create date</th>
                                <th>Status</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $row)
                            <tr>
                                <td>{{$row->name}} </td>
                                <td>{{$row->created_at}}</td>
                                <td>{{$row->status}}</td>
                                <td> 
                                  <a  class="btn btn-success btn-xs" href="{{ url("admin/blog/$row->id/edit") }}">Edit</a> 
                                   <button class="btn btn-danger btn-xs" onclick="deleteItam({{$row->id}})"><i class="fa fa-remove"></i></button>


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
         function deleteItam(id){

              if(confirm("Are you sure?"))
              {

                $.ajax({

                url:'blog/'+id,

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
