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
                         {!! Form::open(array('url' => 'admin/reply_answer/','method' => 'post','class' => 'form-horizontal form-label-left')) !!}

                        <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Question:</label>

                          <input type="hidden" class="form-control" name="id" placeholder="Enter Agenda" value="{{$question->id}}" readonly>
                          <input type="text" class="form-control" name="question" placeholder="Enter Agenda" value="{{$question->question}}" readonly>
                        </div>
                           <div class="form-group">
                          <label class="control-label mb-10" for="email_de">Answer:</label>
                          <input type="text" class="form-control" name="answer" placeholder="Enter Agenda" required="required" value="{{$question->answer}}">
                        </div>
                      
                        <div class="form-group mb-0">
                          <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Reply</span></button>
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
