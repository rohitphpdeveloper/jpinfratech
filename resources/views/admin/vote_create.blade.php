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
                    <h6 class="panel-title txt-dark">Add Event Question</h6>
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
                         @if(isset($resolution_question))
                          {!! Form::open(array('url' => 'admin/voting/'.$resolution_question->id,'method' => 'PUT','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                          @else
                        {!! Form::open(array('url' => 'admin/voting','method' => 'POST','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                        @endif

                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Event</label>
                          <select id="status" name="resolution_id" class="form-control" required="required">
                            @foreach($resolution as $row)
                            <option value="{{$row->id}}">{{$row->agenda}} </option>
                            @endforeach
                          </select>

                        </div>

                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Resolution:</label>
                          <input type="text" class="form-control" name="resolution_text" placeholder="Enter Resolution" required="required" value="{{ old('resolution_text',  isset($resolution_question->resolution_text) ? $resolution_question->resolution_text : null) }}">
                        </div>

                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Resolution Description</label>
                          <textarea name='resolution_description' id="description" rows="4" class="form-control" Placeholder="Resolution Description" required  value="{{ old('resolution_description',  isset($resolution_question->resolution_description) ? $resolution_question->resolution_description : null) }}">{{ old('resolution_description',  isset($resolution_question->resolution_description) ? $resolution_question->resolution_description : null) }}</textarea>
                        </div>
                         
                         <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Add Answer 1</label>
                           <input type="text" class="form-control" name="option_1" placeholder="Enter answer 1" required="required" value="{{ old('option_1',  isset($resolution_question->option_1) ? $resolution_question->option_1 : null) }}">
                        </div>


                         <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Add Answer 2</label>
                           <input type="text" class="form-control" name="option_2" placeholder="Enter answer 2" required="required" value="{{ old('option_2',  isset($resolution_question->option_2) ? $resolution_question->option_2 : null) }}">
                        </div>


                         <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Add Answer 3</label>
                           <input type="text" class="form-control" name="option_3" placeholder="Enter answer 3" required="required" value="{{ old('option_3',  isset($resolution_question->option_3) ? $resolution_question->option_3 : null) }}">
                        </div>

                        <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Status</label>
                          <select id="status" name="status" class="form-control" required="required" >
                            <option value="active" @if(isset($resolution_question->status)) @if($resolution_question->status=='active') {{ 'selected' }} @endif @endif>Active </option>
                            <option value="inactive" @if(isset($resolution_question->status)) @if($resolution_question->status=='inactive') {{'selected' }} @endif @endif>Inactive </option>
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
 <script>tinymce.init({ selector:'#description' });</script>
@endsection
