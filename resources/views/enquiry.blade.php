@extends('layouts.app')

@section('content')
<style>
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}


::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <i class="fa fa-comment"></i> Enquiry
                 
                <div class="panel-body">
                    <ul class="chat">
                        @foreach($enquires as $row)
                        <li class="left clearfix"><span class="chat-img pull-left">
                            {{Html::image('public/images/user.png','',array('class'=>'img-circle img-responsive','width'=>'50px'))}}
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">{{$user->name}}</strong> 
                                </div>
                                <p>
                                   {{$row->question}}
                                </p>
                            </div>
                        </li>
                       
                       @if(!empty($row->answer))
                        <li class="right clearfix"><span class="chat-img pull-right">
                             {{Html::image('public/images/admin.png','',array('class'=>'img-circle img-responsive','width'=>'50px'))}}
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="pull-right primary-font">Admin</strong>
                                </div>
                                <p>
                                    {{$row->answer}}
                                </p>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                     @if (count($errors) > 0)
                       <div class="alert alert-danger">
                              <ul class='text'>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                        </div>
                        @endif
                         @if(session()->has('success'))
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> {{ session()->get('success') }}</strong> 
                          </div>
                         @endif

               {!! Form::open(array('url' => 'user_enquiry','method' => 'POST','class' => 'form-horizontal form-label-left')) !!}

                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" name="question" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
  window.setTimeout(function() {
              $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 2000);
</script
@endsection