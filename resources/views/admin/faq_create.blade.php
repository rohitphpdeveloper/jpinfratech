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
                    <h6 class="panel-title txt-dark">Add Faq</h6>
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

                         @if(isset($faq))
                          {!! Form::open(array('url' => 'admin/faq/'.$faq->id,'method' => 'PUT','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                          @else
                        {!! Form::open(array('url' => 'admin/faq','method' => 'POST','class' => 'form-horizontal form-label-left', 'files' => true)) !!}
                        @endif


                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Question:</label>
                          <input type="text" class="form-control" name="question" placeholder="Enter Your Question" required="required" value="{{ old('question',  isset($faq->question) ? $faq->question : null) }}">
                        </div>

                         <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Description:</label>
                          <textarea name='description' id="description" rows="8" class="form-control" value="{{ old('description',  isset($faq->description) ? $faq->description : null) }}">{{ old('description',  isset($faq->description) ? $faq->description : null) }}</textarea>
                        </div>
                        
                         <div class="form-group">
                          <label class="control-label mb-10" for="pwd_de">Status</label>
                          <select id="status" name="status" class="form-control" required="required" >
                            <option value="active" @if(isset($faq->status)) @if($faq->status=='active') {{ 'selected' }} @endif @endif>Active </option>
                            <option value="inactive" @if(isset($faq->status)) @if($faq->status=='inactive') {{'selected' }} @endif @endif>Inactive </option>
                          </select>
                        </div>
                        <div class="form-group mb-0">
                          <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                        </div>  
                      {!! Form::close() !!}
                       @section('footerscript')
                      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                       <script>tinymce.init({ selector:'#description' });</script>
                       @endsection
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
