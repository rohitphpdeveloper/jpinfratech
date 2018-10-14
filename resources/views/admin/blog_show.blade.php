@extends('admin.master')


@section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Show Blog </h3>
              </div>

             
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Blog </h2>
               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    {!! Form::open(array('url' => 'admin/blog','method' => 'POST','class' => 'form-horizontal form-label-left')) !!}
                     @foreach($blogs as $row)

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Heading <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$row->name}}">
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Url 
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <p class="form-control col-md-7 col-xs-12">{{$row->url}}</p>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Content<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                          <textarea name='description' id="description" rows="10" class="form-control">{{$row->description}}</textarea>
                        </div>
                      </div>
                        

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">meta title
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea name='meta_title' id="meta_title" rows="3" class="form-control">{{$row->meta_title}}</textarea>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> meta description<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea name='meta_description' id="meta_description" rows="3" class="form-control">{{$row->meta_description}}</textarea>
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                        Status  <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          {{ $row->status}}
                        </div>
                      </div>
                    <div class="ln_solid"></div>

                    @endforeach
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
@endsection
