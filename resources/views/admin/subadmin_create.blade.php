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
                    <h6 class="panel-title txt-dark">Add Sub Admin</h6>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="form-wrap">
                        @if (count($errors) > 0)
                       <div class="alert alert-danger">
                              <ul class='text'>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                        @endif

                         @if(isset($sub_admin))
                          {!! Form::open(array('url' => 'admin/sub_admin/'.$sub_admin->id,'method' => 'PUT','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                          @else
                        {!! Form::open(array('url' => 'admin/sub_admin','method' => 'POST','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                        @endif
                         
                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter name" required="required" value="{{ old('name',isset($sub_admin->name) ? $sub_admin->name : NULL)}}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter email" required="required" value="{{ old('email',isset($sub_admin->email) ? $sub_admin->email : NULL)}}" @if(isset($sub_admin->email)) readonly @endif>
                        </div>
                        @if(empty($sub_admin->password))
                        <div class="form-group">
                          <label class="control-label mb-10" for="mobile">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="">
                        </div>
                        @endif
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Sub Admin Type</label>
                          <select id="status" name="admin_type" class="form-control" required="required" id="admin_type">
                            <option value=""> --Select Sub Admin Type-- </option>
                            @foreach($category as $row)
                            <option value="{{$row->id}}" @if(isset($sub_admin->admin_type)) @if($row->id==$sub_admin->admin_type) selected @endif @endif>{{$row->name}} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Status</label>
                          <select id="status" name="status" class="form-control" required="required" id="status">
                            <option value="1" @if(isset($sub_admin->status)) @if($sub_admin->status==1) selected @endif @endif>Active </option>
                            <option value="0" @if(isset($sub_admin->status)) @if($sub_admin->status==0) selected @endif @endif>Inactive </option>
                          </select>
                        </div>



                        <div class="form-group mb-0">
                          <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                        </div>  
                      {!! Form::close() !!}
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
<script type="text/javascript">

  $("select").on('change', function() {
    var user_type=this.value;

    if(user_type==1){
      $("#home_buy").hide();
      $("#fd_holder").show();
    }
    else if(user_type==2){
      $("#home_buy").show();
      $("#fd_holder").hide();

    }else{
        $("#fd_holder").hide();
        $("#home_buy").hide();
    }


});
</script>

@endsection
