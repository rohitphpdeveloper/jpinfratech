@extends('admin.master')
@section('content')

      <!-- Main Content -->
      <div class="page-wrapper">
        <div class="container-fluid">
                 
          <!-- Row -->
          <div class="row">
        <div class="col-sm-12">
              <div class="panel panel-default card-view">
                <div class="panel-heading">
                  <div class="pull-left">
                    <h6 class="panel-title txt-dark">Excel upload</h6>

                  </div>
                    <a href="{{url('admin/user_import')}}"><button>upload new </button></a> 
                  <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="form-wrap">
                      

                        <div class="form-group">
                        <h2>Total Recodes {{count($errors)}}<h2>
                        @if (count($errors) > 0)
                       <div class="">
                            <ul class="list-group">
                                @foreach ($errors as $error)
                                  <li class="list-group-item">{{ $error['user_id']}} {{ $error['message'] }}</li>
                                @endforeach
                            </ul>
                          </div>
                      @endif
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <!-- /Row -->
       
        </div>
      
      </div>
@endsection

@section('footerscript')


@endsection
