@extends('admin.master')


@section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>CMS</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <br />

                    {!! Form::open(array('class' => 'form-horizontal form-label-left')) !!}
                     
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
                          
                        </div>
                      </div>

                    </form>
              
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
@endsection
