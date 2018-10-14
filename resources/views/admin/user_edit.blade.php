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

                    <h6 class="panel-title txt-dark">Update User</h6>

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



                       

                          {!! Form::open(array('url' => 'admin/users/'.$users->id,'method' => 'PUT','class' => 'form-horizontal form-label-left', 'files' => true)) !!}



                          <div class="form-group">

                          <label class="control-label mb-10" for="email_de">fd/uint no</label>

                          <input type="text" class="form-control" name="fd_no" placeholder="Enter no" required="required" value="{{$users->fd_no}}">

                        </div>

                        <div class="form-group">

                          <label class="control-label mb-10" for="email_de">Voting Share </label>

                          <input type="text" class="form-control" name="voting_share" min="0" max="100" placeholder="Enter Voting Share" required="required" value="{{$users->voting_share}}">

                        </div>

                        <div class="form-group">

                          <label class="control-label mb-10" for="email_de">Name</label>

                          <input type="text" class="form-control" name="name" placeholder="Enter name" required="required" value="{{$users->name}}">

                        </div>



                          <div class="form-group">

                          <label class="control-label mb-10" for="email_de">Email</label>

                          <input type="text" class="form-control" name="email" placeholder="Enter email" required="required" value="{{$users->email}}">

                        </div>



                          <div class="form-group">

                          <label class="control-label mb-10" for="mobile">Mobile</label>

                          <input type="text" class="form-control" name="mobile" placeholder="Enter mobile" required="required" value="{{$users->mobile}}">

                        </div>

                         

                        <div class="form-group">

                          <label class="control-label mb-10" for="pwd_de">User Type</label>

                          <select id="status" name="user_type" class="form-control" required="required" id="user_type">

                            <option value=""> --Select User Type-- </option>

                            @foreach($category as $row)

                            <option value="{{$row->id}}" @if($users->user_type==$row->id) selected  @endif>{{$row->name}} </option>

                            @endforeach

                          </select>

                        </div>



                        <div id="fd_holder" @if($users->user_type==1) @else style="display: none" @endif>

                          

                             <div class="form-group">

                            <label class="control-label mb-10" for="email_de">email2</label>

                            <input type="text" class="form-control" name="email2" placeholder="Enter email2"  value="{{$users->email2}}">

                          </div>



                          <div class="form-group">

                            <label class="control-label mb-10" for="email_de">PRN amt</label>

                            <input type="text" class="form-control" name="prn_amt" placeholder="Enter prn amt"  value="{{$users->prn_amt}}">

                          </div>



                            <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Int amt</label>

                            <input type="text" class="form-control" name="int_amt" placeholder="Enter int amt"  value="{{$users->int_amt}}">

                          </div>



                            <div class="form-group">

                            <label class="control-label mb-10" for="email_de"> Mat date</label>

                            <input type="text" class="form-control" name="mat_date" placeholder="Enter mat date"  value="{{$users->mat_date}}">

                          </div>



                          <div class="form-group">

                            <label class="control-label mb-10" for="email_de">ROI</label>

                            <input type="text" class="form-control" name="roi" placeholder="Enter roi"  value="{{$users->roi}}">

                          </div>



                                                    <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Address1</label>

                            <input type="text" class="form-control" name="adr1" placeholder="Enter Address1"  value="{{$users->adr1}}">

                          </div>



                                                    <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Address2</label>

                            <input type="text" class="form-control" name="adr2" placeholder="Enter Address2"  value="{{$users->adr2}}">

                          </div>



                                                    <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Address3</label>

                            <input type="text" class="form-control" name="adr3" placeholder="Enter Address3"  value="{{$users->adr3}}">

                          </div>



                                                    <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Address4</label>

                            <input type="text" class="form-control" name="adr4" placeholder="Enter Address4" value="{{$users->adr4}}">

                          </div>



                                                    <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Pin</label>

                            <input type="text" class="form-control" name="pin" placeholder="Enter pin"  value="{{$users->pin}}">

                          </div>



                                                    <div class="form-group">

                            <label class="control-label mb-10" for="email_de">Pan</label>

                            <input type="text" class="form-control" name="pan" placeholder="Enter pan"  value="{{$users->pan}}">

                          </div>



   

                        </div>

                        <!--  home_buy -->



                        <div id="home_buy" @if($users->user_type==2)  @else style="display: none" @endif>



                           <div class="form-group">

                            <label class="control-label mb-10" for="email_de">sale_order</label>

                            <input type="text" class="form-control" name="sale_order" placeholder="Enter sale_order"  value="{{$users->sale_order}}">

                          </div>





                                <div class="form-group">

                            <label class="control-label mb-10" for="email_de">customer</label>

                            <input type="text" class="form-control" name="customer" placeholder="Enter customer"  value="{{$users->customer}}">

                          </div>



                                <div class="form-group">

                            <label class="control-label mb-10" for="email_de">collection</label>

                            <input type="text" class="form-control" name="collection" placeholder="Enter collection"  value="{{$users->collection}}">

                          </div>





                                <div class="form-group">

                            <label class="control-label mb-10" for="email_de">interest</label>

                            <input type="text" class="form-control" name="interest" placeholder="Enter interest"  value="{{$users->interest}}">

                          </div>





                                <div class="form-group">

                            <label class="control-label mb-10" for="email_de">total</label>

                            <input type="text" class="form-control" name="total" placeholder="Enter total"  value="{{$users->total}}">

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

