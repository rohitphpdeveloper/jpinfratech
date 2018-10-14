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
                    <h6 class="panel-title txt-dark">Add Resolution</h6>
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

                         @if(isset($resolution))
                          {!! Form::open(array('url' => 'admin/resolution/'.$resolution->id,'method' => 'PUT','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                          @else
                        {!! Form::open(array('url' => 'admin/resolution','method' => 'POST','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                        @endif

                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Category</label>
                          <select id="status" name="category_id[]" class="form-control" required="required" multiple>
                            <option disabled>Select User Category </option>
                            @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->name}} </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Agenda:</label>
                          <input type="text" class="form-control" name="agenda" placeholder="Enter Agenda" required="required" value="{{ old('agenda',  isset($resolution->agenda) ? $resolution->agenda : null) }}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Start Date:</label>
                          <input type="date" class="form-control" name="startdate" required="required" value="{{ old('startdate',  isset($resolution->startdate) ? $resolution->startdate : null) }}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Start Time:</label>
                          <input type="time" class="form-control" name="start_time" required="required" value="{{ old('start_time',  isset($resolution->start_time) ? $resolution->start_time : null) }}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">End Date:</label>
                          <input type="date" class="form-control" name="enddate" required="required" value="{{ old('enddate',  isset($resolution->enddate) ? $resolution->enddate : null) }}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">End Time:</label>
                          <input type="time" class="form-control" name="end_time" required="required" value="{{ old('end_time',  isset($resolution->end_time) ? $resolution->end_time : null) }}">
                        </div>
                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Upload Resolution File(In PDF ONLY)</label>
                          <input type="file" class="form-control" name="resolutionfile" accept="application/pdf">
                        </div>
                         <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Status</label>
                          <select id="status" name="status" class="form-control" required="required" >
                            <option value="active" @if(isset($resolution->status)) @if($resolution->status=='active') {{ 'selected' }} @endif @endif>Active </option>
                            <option value="inactive" @if(isset($resolution->status)) @if($resolution->status=='inactive') {{'selected' }} @endif @endif>Inactive </option>
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
