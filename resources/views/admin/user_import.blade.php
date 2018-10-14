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
                    <h6 class="panel-title txt-dark">Excel upload</h6>
                  </div>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="form-wrap">

                        {!! Form::open(array('url' => 'admin/user_import','method' => 'POST','class' => 'form-inline', 'files' => true)) !!}
                         <div class="form-group mr-15">
                          <label class="control-label mr-10" for="email_inline">upload excel</label>
                          <input type="file" name="excel_import" required="">
                        </div>
                  
                  
                        <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                      </form>
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


@endsection
