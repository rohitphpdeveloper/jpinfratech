@extends('layouts.homeapp')
@section('content')
<div class="container" style="margin-top:50px;margin-bottom:200px;">
    <div class="section_4">
        <div class="faq_section">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="tt-title h4 gray no-desc yellow">FAQ</h4>
                    <div class="empty-space lg-30  sm-30 xs-30"></div>
                    <div class="tt-accordeon">
                        @foreach($faq as $row)
                        <div class="tt-accordeon-title"  data-toggle="collapse" data-target="#section{{$row->id}}">{{$row->question}}</div>
                        <div class="tt-panel collapse" style="display: none;" id="section{{$row->id}}">
                            <div class="simple-text">
                                <p>{!!$row->description!!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection