@extends('admin.master')


@section('content')
 <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Enquires List</h5>
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
                            <th>User Name</th>
                            <th>Category</th>
                            <th style="width: 320px;">Question</th>
                            <th style="width: 320px;">Answer</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                         @foreach($enquires as $row)
                            <tr>
                                <td>{{$row->user->name}} </td>
                                <td>{{$row->category->name}} </td>
                                <td>{{$row->question}}</td>
                                <td>{{$row->answer}}</td>
                                <td><a class="btn btn-success btn-xs" href="{{ url("admin/reply/$row->id") }}"><i class="fa fa-pencil"></i></a>
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

                url:'queries/'+id,

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
