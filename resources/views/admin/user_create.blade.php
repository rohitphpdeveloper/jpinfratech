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
                    <h6 class="panel-title txt-dark">Add User</h6>
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

                         @if(isset($users))
                          {!! Form::open(array('url' => 'admin/users/'.$users->id,'method' => 'PUT','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                          @else
                        {!! Form::open(array('url' => 'admin/users','method' => 'POST','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                        @endif

                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">fd/uint no</label>
                          <input type="text" class="form-control" name="fd_no" placeholder="Enter no" required="required" value="{{ old('fd_no ')}}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Voting Share </label>
                          <input type="text" class="form-control" name="voting_share" min="0" max="100" placeholder="Enter Voting Share" required="required" value="{{ old('voting_share ')}}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter name" required="required" value="{{ old('name')}}">
                        </div>

                          <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Enter email" required="required" value="{{ old('email')}}">
                        </div>

                          <div class="form-group">
                          <label class="control-label mb-10" for="mobile">Mobile</label>
                          <input type="text" class="form-control" name="mobile" placeholder="Enter mobile" required="required" value="{{ old('mobile')}}">
                        </div>
                         
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">User Type</label>
                          <select id="status" name="user_type" class="form-control" required="required" id="user_type">
                            <option value=""> --Select User Type-- </option>
                            @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->name}} </option>
                            @endforeach
                          </select>
                        </div>

                        <div id="fd_holder" style="display: none">
                          
                             <div class="form-group">
                            <label class="control-label mb-10" for="email_de">email2</label>
                            <input type="text" class="form-control" name="email2" placeholder="Enter email2"  value="{{ old('email2')}}">
                          </div>

                          <div class="form-group">
                            <label class="control-label mb-10" for="email_de">PNR amt</label>
                            <input type="text" class="form-control" name="prn_amt" placeholder="Enter prn amt"  value="{{ old('prn_amt')}}">
                          </div>

                            <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Int amt</label>
                            <input type="text" class="form-control" name="int_amt" placeholder="Enter int amt"  value="{{ old('int_amt')}}">
                          </div>

                            <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Mat date</label>
                            <input type="text" class="form-control" name="mat_date" placeholder="Enter mat date"  value="{{ old('mat_date')}}">
                          </div>

                          <div class="form-group">
                            <label class="control-label mb-10" for="email_de">ROI</label>
                            <input type="text" class="form-control" name="roi" placeholder="Enter roi"  value="{{ old('roi')}}">
                          </div>

                                                    <div class="form-group">
                            <label class="control-label mb-10" for="email_de">address1</label>
                            <input type="text" class="form-control" name="adr1" placeholder="Enter address1"  value="{{ old('adr1')}}">
                          </div>

                                                    <div class="form-group">
                            <label class="control-label mb-10" for="email_de">address2</label>
                            <input type="text" class="form-control" name="adr2" placeholder="Enter address2"  value="{{ old('adr2')}}">
                          </div>

                                                    <div class="form-group">
                            <label class="control-label mb-10" for="email_de">address3</label>
                            <input type="text" class="form-control" name="adr3" placeholder="Enter address3"  value="{{ old('adr3')}}">
                          </div>

                                                    <div class="form-group">
                            <label class="control-label mb-10" for="email_de">address4</label>
                            <input type="text" class="form-control" name="adr4" placeholder="Enter address4" value="{{ old('adr4')}}">
                          </div>

                                                    <div class="form-group">
                            <label class="control-label mb-10" for="email_de">pin</label>
                            <input type="text" class="form-control" name="pin" placeholder="Enter pin"  value="{{ old('pin')}}">
                          </div>

                                                    <div class="form-group">
                            <label class="control-label mb-10" for="email_de">pan</label>
                            <input type="text" class="form-control" name="pan" placeholder="Enter pan"  value="{{ old('pan')}}">
                          </div>

   
                        </div>
                        <!--  home_buy -->

                        <div id="home_buy" style="display: none">

                           <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Sale order</label>
                            <input type="text" class="form-control" name="sale_order" placeholder="Enter sale_order"  value="{{ old('sale_order')}}">
                          </div>


                                <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Customer</label>
                            <input type="text" class="form-control" name="customer" placeholder="Enter customer"  value="{{ old('customer')}}">
                          </div>

                                <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Collection</label>
                            <input type="text" class="form-control" name="collection" placeholder="Enter collection"  value="{{ old('collection')}}">
                          </div>


                                <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Interest</label>
                            <input type="text" class="form-control" name="interest" placeholder="Enter interest"  value="{{ old('interest')}}">
                          </div>


                                <div class="form-group">
                            <label class="control-label mb-10" for="email_de">Total</label>
                            <input type="text" class="form-control" name="total" placeholder="Enter total"  value="{{ old('total')}}">
                          </div>



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
