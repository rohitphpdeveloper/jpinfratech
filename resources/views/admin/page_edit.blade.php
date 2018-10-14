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
                    <h6 class="panel-title txt-dark">Edit CMS</h6>
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

                         {!! Form::open(array('url' => 'admin/pages/'.$pages->id,'method' => 'PUT','class' => 'form-horizontal form-label-left')) !!}
                     
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Page name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$pages->name}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Meta Title<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="meta_title" name="meta_title" value="@if(isset($pages->meta_title)){{$pages->meta_title}} @endif" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Meta Description <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="name" name="meta_description" value="@if(isset($pages->meta_description)){{$pages->meta_description}}@endif" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Sort <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="sort" name="sort"  value="5" required="required" class="form-control col-md-7 col-xs-12" value="{{$pages->sort}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">About Page <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <textarea name='description' id="description" rows="20" class="form-control">{{$pages->description}}</textarea>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                           <select id="status" name="status" required="required" class="form-control col-md-7 col-xs-12" >
                            <option value="active" @if($pages->status=='active') selected="selected" @endif >Active </option>
                            <option value="inactive" @if($pages->status=='inactive') selected="selected" @endif>InActive</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
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
