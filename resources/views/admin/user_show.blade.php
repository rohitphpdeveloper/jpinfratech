@extends('admin.master')


@section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View User Details</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                  
                       {!! Form::open(array('url' => 'admin/users','method' => 'POST','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" readonly class="form-control col-md-7 col-xs-12" value="{{$user->name}}" name="name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="last-name" name="email" readonly class="form-control col-md-7 col-xs-12" value="{{$user->email}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">mobile</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="mobile" value="{{$user->mobile}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Linkedin Url</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="linkedinurl" value="@if(!empty($user->profile->linkedinurl)){{$user->profile->linkedinurl}} @endif">
                        </div>
                      </div>
                     <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" name="profileimg" value="@if(!empty($user->profile->profileimg)){{$user->profile->profileimg}} @endif">
                          @if(!empty($user->profile->profileimg)){{Html::image('public/images/profileimage/'.$user->profile->profileimg,'Profile Image not Found',array( 'width' =>120 , 'height' => 120 )) }}@endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="address" value="@if(!empty($user->profile->address)){{$user->profile->address}} @endif">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="country_id" id="country" required="" disabled>
                              <option value="">---Select Country---</option>
                              @foreach($countries as $row)
                              <option value="{{ $row->id }}" @if(isset($user->profile->country_id )) @if($row->id==$user->profile->country_id) {{ 'selected' }} @endif @endif>{{ $row->name }}</option>
                              @endforeach
                           </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="country_id" id="country" required="" disabled>
                            @if(!empty($states))
                              @foreach($states as $row)
                              <option value="{{ $row->id }}" @if(isset($user->profile->state_id)) @if(!empty($row->id==$user->profile->state_id)) {{ 'selected' }} @endif @endif>{{ $row->name }}</option>
                              @endforeach
                             @endif
                           </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="country_id" id="country" required="" disabled>
                             @if(!empty($cities))
                              @foreach($cities as $row)
                              <option value="{{ $row->id }}" @if(!empty($row->id==$user->profile->city_id)) {{ 'selected' }} @endif>{{ $row->name }}</option>
                              @endforeach
                             @endif
                           </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Zip</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="zip" value="@if(!empty($user->profile->zip)){{$user->profile->zip}} @endif">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Total Experience (Year)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="country_id" id="country" required="" disabled >
                              <option value="">-Select Experience (Year)-</option>
                                @for($i=0;$i<=30;$i++) 
                                <option value="{{$i}}" @if(isset($user->profile->totalexp_yrs)) @if($i==$user->profile->totalexp_yrs){{ 'selected' }}  @endif @endif>{{ $i.' '.'year'}}</option>
                                @endfor
                           </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Total Experience (Month)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="country_id" id="country" required="">
                              <option value="">-Select Month-</option>
                              @for($m=1; $m<=12; ++$m)
                              <option value="{{$m}}" @if(isset($user->profile->totalexp_month)) @if($m==$user->profile->totalexp_month){{ 'selected' }} @endif @endif>{{date('F', mktime(0, 0, 0, $m, 1))}}</option>
                              @endfor
                           </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Enter Skills separated by a comma ( , )</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="key_skill" value="@if(!empty($user->profile->key_skill)){{$user->profile->key_skill}} @endif">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Job Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="jobcategories_id" id="jobcategories_id" required="" disabled>
                             @if(!empty($categories))
                              @foreach($categories as $row)
                              <option value="{{ $row->id }}" @if(!empty($row->id==$user->profile->jobcategories_id)) {{ 'selected' }} @endif>{{ $row->name }}</option>
                              @endforeach
                             @endif
                           </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Please Upload Resume</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" name="resume">
                          <p>@if(isset($user->profile->resume)) {{$user->profile->resume}} @endif </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Current CTC Monthly</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="current_ctc" value="@if(!empty($user->profile->current_ctc)){{$user->profile->current_ctc}} @endif">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Expected CTC Monthly</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="expected_ctc" value="@if(!empty($user->profile->expected_ctc)){{$user->profile->expected_ctc}} @endif">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
         </div>
@endsection
