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
                    <h6 class="panel-title txt-dark">Add News</h6>
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

                       {!! Form::open(array('url' => 'admin/blog','method' => 'POST','class' => 'form-horizontal form-label-left' ,'files' => true)) !!}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Heading<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Short Content<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea name='short_description' id="short_description" rows="8" class="form-control"></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Content<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea name='description' id="description" rows="8" class="form-control"></textarea>
                        </div>
                      </div>
               
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">meta title
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea name='meta_title' id="meta_title" rows="3" class="form-control"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> meta description
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea name='meta_description' id="meta_description" rows="3" class="form-control"></textarea>
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Image
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                           <input type="file" id="image" name="image" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                        Show Home page  <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <select id="home" name="home" required="required" class="form-control col-md-7 col-xs-12" >
                           <option value="active">Active </option>
                           <option value="inactive" selected>Inactive </option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                        Status  <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <select id="status" name="status" required="required" class="form-control col-md-7 col-xs-12" >
                           <option value="active">Active </option>
                           <option value="inactive">Inactive </option>
                          </select>
                        </div>
                      </div>

                    <div class="ln_solid"></div>

                      <div class="form-group">
                      <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">submit</button>
                        
                      </div>
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
