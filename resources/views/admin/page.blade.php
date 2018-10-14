@extends('admin.master')


@section('content')
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Cms Pages List</h5>
          </div>
          <!-- Breadcrumb -->
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 resolutionbtn">
            <a href="{{url('admin/pages/create')}}" class="btn btn-success btn-anim btn-sm addbtn"><i class="icon-rocket"></i><span class="btn-text">Create Page</span></a>
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
                              <th>Id</th>
                              <th>Name</th>
                              <th>Url</th>
                              <th>Sort</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                        <tbody>
                            @foreach($pages as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}} </td>
                                <td>{{$row->url}}</td>
                                <td>{{$row->sort}}</td>
                                <td>{{$row->status}}</td>

                                <td>
                                 <!--  <a class="btn btn-primary btn-xs" href="{{ url("admin/pages/$row->id") }}">View</a>  -->
                                  <a class="btn btn-info btn-xs" href="{{ url("admin/pages/$row->id/edit") }}">Edit</a> 
                                  <button class="btn btn-danger btn-xs" onclick="deleteItam({{$row->id}})">Delete</button>
                              </td>

                            </tr>
                            @endforeach
                        </tbody>

                      </table>
                       @section('footerscript')

            {{ Html::script('public/admin/js/jquery.dataTables.min.js') }}
            {{ Html::style('public/admin/css/jquery.dataTables.min.css') }}

            
          <script type="text/javascript" class="init"> 
          $(document).ready(function() {
            $('#view_table').DataTable( {
                "pageLength": 50
            });
            
            });

            function deleteItam(id){
              if(confirm("Are you sure?"))
              {
                $.ajax({
                url:'pages/'+id,
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
        
          
          </script>
            
                  @endsection

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
